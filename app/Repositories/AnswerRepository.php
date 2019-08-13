<?php

namespace App\Repositories;

use App\Contracts\AnswerContact;
use App\Contracts\SurveyContact;
use App\Entities\Label;
use App\Entities\Question;
use App\Entities\Survey;
use App\Filters\SurveyFilter;
use Illuminate\Http\Request;

class AnswerRepository implements AnswerContact
{
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
     * @return mixed|void
     */
    public function createAnswer(Request $request, Survey $survey)
    {
        $rating = $request->input('rating');
        $lang = $request->input('lang');
        $event = $request->input('event');

        $survey = $survey->where('lang', $lang)->where('event_type', $event)->first();

        $survey->answer()->create($request->input());

        if ($rating >= 7) {
            $survey->increment('promoters', 1);
        } else if (($rating >= 4) && ($rating < 7)) {
            $survey->increment('passives', 1);
        } else {
            $survey->increment('detractors', 1);
        }

        $survey->increment('count', 1);
    }
}
