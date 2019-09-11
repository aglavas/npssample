<?php

namespace App\Http\Controllers;

use App\Contracts\SurveyContact;
use App\Entities\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @param Survey $survey
     * @param SurveyContact $surveyContact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Survey $survey, SurveyContact $surveyContact)
    {
        $surveys = $surveyContact->getAllSurveys($survey, $request);

        $surveyStatistic = $surveyContact->getSurveysOverview($survey);

        return view('admin.dashboard', compact(['surveys', 'surveyStatistic']));
    }
}
