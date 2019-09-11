<?php

namespace App\Repositories;

use App\Contracts\AnswerTrackingContract;
use App\Entities\AnswerTracking;

class AnswerTrackingRepository implements AnswerTrackingContract
{
    /**
     * @var AnswerTracking
     */
    private $model;

    /**
     * AnswerTrackingRepository constructor.
     * @param AnswerTracking $answerTracking
     */
    public function __construct(AnswerTracking $answerTracking)
    {
        $this->model = $answerTracking;
    }

    /**
     * Create answer tracking
     *
     * @param array $params
     * @return mixed|void
     */
    public function create(array $params)
    {
        $this->model->create($params);
    }

    /**
     * Check if cookie already tracked
     *
     * @param string $cookieName
     * @param string $cookieValue
     * @return mixed
     */
    public function checkCookie(string $cookieName, string $cookieValue)
    {
        $result = $this->model->where('cookie_name', $cookieName)->where('cookie_value', $cookieValue)->count();

        return $result;
    }
}
