<?php

namespace App\Contracts;

interface AnswerTrackingContract
{
    /**
     * Create tracking for cookie
     *
     * @param array $params
     * @return mixed
     */
    public function create(array $params);

    /**
     * Check if cookie already tracked
     *
     * @param string $cookieName
     * @param string $cookieValue
     * @return mixed
     */
    public function checkCookie(string $cookieName, string $cookieValue);
}
