<?php

namespace App\Http\Controllers;

use App\Contracts\AnswerContact;
use App\Entities\Answer;
use App\Entities\Label;
use App\Entities\Question;
use App\Entities\Survey;
use App\Http\Requests\AnswerGetRequest;
use App\Http\Requests\AnswerStoreRequest;

class AnswerController extends Controller
{
    /**
     * Returns answer view
     *
     * @param AnswerGetRequest $request
     * @param Question $question
     * @param Label $label
     * @param AnswerContact $answerContact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(AnswerGetRequest $request, Question $question, Label $label, AnswerContact $answerContact)
    {
        $result = $answerContact->prepareAnswerViewData($request, $question, $label);

        return view('answer.answer')->with($result);
    }

    /**
     * Store answer entity
     *
     * @param AnswerStoreRequest $request
     * @param Answer $answer
     * @param Survey $survey
     * @param AnswerContact $answerContact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(AnswerStoreRequest $request, Answer $answer, Survey $survey, AnswerContact $answerContact)
    {
        try {
            $answerContact->createAnswer($request, $survey);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'There was an unexpected error while saving feedback.');
        }

        return view('answer.success');
    }
}
