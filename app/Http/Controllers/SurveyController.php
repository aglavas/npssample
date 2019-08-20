<?php

namespace App\Http\Controllers;

use App\Entities\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Show survey details
     *
     * @param Request $request
     * @param Survey $survey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Survey $survey)
    {
        $survey->load('answer.label');

        $user = Auth::user();

        return view('admin.survey.index', compact(['user', 'survey']));
    }
}
