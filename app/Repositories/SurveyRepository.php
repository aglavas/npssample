<?php

namespace App\Repositories;

use App\Contracts\SurveyContact;
use App\Entities\Survey;
use App\Filters\SurveyFilter;
use Illuminate\Http\Request;

class SurveyRepository implements SurveyContact
{
    /**
     * @var SurveyFilter
     */
    private $filter;

    /**
     * SurveyRepository constructor.
     * @param SurveyFilter $filter
     */
    public function __construct(SurveyFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all surveys
     *
     * @param Survey $survey
     * @param Request $request
     * @return Survey[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAllSurveys(Survey $survey, Request $request)
    {
        $surveys = $survey->with('shop')->filter($this->filter)->get();

        return $surveys;
    }

    /**
     * Get statistic information for all surveys
     *
     * @param Survey $survey
     * @return array|mixed
     */
    public function getSurveysOverview(Survey $survey)
    {
        $surveyCount = $survey->count();

        $responsesCount = $survey->sum('count');

        $promotersCount = $survey->sum('promoters');
        $passivesCount = $survey->sum('passives');
        $detractorsCount = $survey->sum('detractors');

        return [
            'surveyCount' => $surveyCount,
            'responsesCount' => $responsesCount,
            'promotersCount' => $promotersCount,
            'passivesCount' => $passivesCount,
            'detractorsCount' => $detractorsCount,
        ];
    }
}
