<?php

namespace App\Contracts;

use App\Entities\Label;
use App\Entities\Question;
use App\Entities\Survey;
use Illuminate\Http\Request;

interface AnswerContract
{
    /**
     * Prepare answer view data
     *
     * @param Request $request
     * @param Question $question
     * @param Label $label
     * @return mixed
     */
    public function prepareAnswerViewData(Request $request, Question $question, Label $label);

    /**
     * Create answer with related data
     *
     * @param Request $request
     * @param Survey $survey
     * @param AnswerTrackingContract $trackingContract
     * @param string $cookieValue
     * @return mixed
     */
    public function createAnswer(Request $request, Survey $survey, AnswerTrackingContract $trackingContract, string $cookieValue);
}
