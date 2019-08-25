<?php

namespace App\Http\Controllers;

use App\Entities\Survey;
use App\Repositories\AnswerRepository;

class SurveyController extends Controller
{
    /**
     * Show survey details
     *
     * @param Survey $survey
     * @param AnswerRepository $answerRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Survey $survey, AnswerRepository $answerRepository)
    {
        $answers = $answerRepository->searchAnswers();

        return view('admin.survey.index', compact(['survey', 'answers']));
    }

    /**
     * Get survey statistics
     */
    public function getStatistics()
    {
        dd('Under construction');
    }
}
