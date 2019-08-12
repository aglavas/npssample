<?php

namespace App\Contracts;

use App\Entities\Survey;
use Illuminate\Http\Request;

interface SurveyContact
{
    /**
     * Get all surveys
     *
     * @param Survey $survey
     * @param Request $request
     * @return mixed
     */
    public function getAllSurveys(Survey $survey, Request $request);

    /**
     * Get statistic information for all surveys
     *
     * @param Survey $survey
     * @return mixed
     */
    public function getSurveysOverview(Survey $survey);
}
