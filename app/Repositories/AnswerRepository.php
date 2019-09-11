<?php

namespace App\Repositories;

use App\Contracts\AnswerContract;
use App\Contracts\AnswerTrackingContract;
use App\Entities\Answer;
use App\Entities\Label;
use App\Entities\Question;
use App\Entities\Survey;
use App\Filters\AnswerFilter;
use App\Services\FreshDeskAdapter;
use Illuminate\Http\Request;

class AnswerRepository implements AnswerContract
{
    /**
     * @var AnswerFilter
     */
    private $filter;

    /**
     * @var Answer
     */
    private $model;

    /**
     * @var FreshDeskAdapter
     */
    private $freshDesk;

    /**
     * @var Label
     */
    private $label;

    /**
     * AnswerRepository constructor.
     * @param AnswerFilter $filter
     * @param Answer $answer
     * @param FreshDeskAdapter $freshDeskAdapter
     * @param Label $label
     */
    public function __construct(AnswerFilter $filter, Answer $answer, FreshDeskAdapter $freshDeskAdapter, Label $label)
    {
        $this->filter = $filter;
        $this->model = $answer;
        $this->freshDesk = $freshDeskAdapter;
        $this->label = $label;
    }

    /**
     * Prepare answer view data
     *
     * @param Request $request
     * @param Question $question
     * @param Label $label
     * @return array|mixed
     */
    public function prepareAnswerViewData(Request $request, Question $question, Label $label)
    {
        $lang = $request->input('lang');
        $event = $request->input('event');
        $hash = $request->input('hash');

        $question = $question->find(1);
        $actualQuestion = $question->translate($lang);

        $labels = $label->with(['translations' => function($q) use ($lang) {
            $q->where('locale', $lang);
        }])->get();

        $labelTranslations = [];

        $labelTranslations[null] = 'Choose';

        foreach ($labels as $label) {
            $labelTranslations[$label->id] = $label->translations->first()->content;
        }

        $ratingArray = [
            null => 'Choose',
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
        ];

        return ['lang' => $lang, 'event' => $event, 'hash' => $hash, 'question' => $actualQuestion, 'labelTranslations' => $labelTranslations, 'ratingArray' => $ratingArray];
    }

    /**
     * Create answer with related data
     *
     * @param Request $request
     * @param Survey $survey
     * @param AnswerTrackingContract $trackingContract
     * @param string $cookieName
     * @return mixed|void
     */
    public function createAnswer(Request $request, Survey $survey, AnswerTrackingContract $trackingContract, string $cookieName)
    {
        $rating = $request->input('rating');
        $lang = $request->input('lang');
        $event = $request->input('event');

        $survey = $survey->where('lang', $lang)->where('event_type', $event)->first();

        $survey->answer()->create($request->input());

        $trackingContract->create([
            'cookie_name' => $cookieName,
            'cookie_value' => $request->cookie($cookieName),
        ]);

        if ($rating >= 7) {
            $survey->increment('promoters', 1);
        } else if (($rating >= 4) && ($rating < 7)) {
            $survey->increment('passives', 1);
        } else {
            $survey->increment('detractors', 1);

            //$this->notifyFreshDesk($request);
        }

        $survey->increment('count', 1);
    }

    /**
     * Notify Freshdesk
     *
     * @param Request $request
     */
    private function notifyFreshDesk(Request $request)
    {
        $label = $this->label->find($request->input('label_id'));
        $this->freshDesk->createTicket($request->input('content'), $label->title);
    }

    /**
     * Search answers
     *
     * @return mixed
     */
    public function searchAnswers()
    {
        $answers = $this->model->filter($this->filter)->paginate(5);

        return $answers;
    }
}
