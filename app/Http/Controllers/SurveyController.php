<?php

namespace App\Http\Controllers;

use App\Entities\Label;
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
    public function index(Survey $survey, AnswerRepository $answerRepository, Label $label)
    {
        $answers = $answerRepository->searchAnswers();

        $labels = $label->get();

        return view('admin.survey.index', compact(['survey', 'answers', 'labels']));
    }

    /**
     * Get survey statistics
     */
    public function getStatistics()
    {
        dd('Under construction');
    }
}
