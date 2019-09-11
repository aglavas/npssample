<?php

namespace App\Services;

use App\Contracts\AnswerTrackingContract;
use App\Entities\AnswerTracking;
use Illuminate\Http\Request;

class CookieManager
{
    /**
     * Create cookie if needed
     *
     * @param Request $request
     * @param int $event
     * @param string $lang
     * @return bool|\Illuminate\Cookie\CookieJar|\Symfony\Component\HttpFoundation\Cookie
     */
    public function addCookie(Request $request, int $event, string $lang)
    {
        $cookieName = "nps-answer-$lang-$event";

        if ($request->hasCookie($cookieName) == true) {
            return false;
        } else {
            $cookie = cookie($cookieName, substr(str_shuffle(MD5(microtime())), 0, 20), time() + (10 * 365 * 24 * 60 * 60));
            return $cookie;
        }
    }

    /**
     * Check cookie tracking
     *
     * @param Request $request
     * @param int $event
     * @param string $lang
     * @param AnswerTrackingContract $trackingContract
     * @return bool|string
     */
    public function checkCookieTracking(Request $request, int $event, string $lang, AnswerTrackingContract $trackingContract)
    {
        $cookieName = "nps-answer-$lang-$event";

        if ($request->hasCookie($cookieName) == false) {
            return false;
        } else {
            $cookieValue = $request->cookie($cookieName);
            $result = $trackingContract->checkCookie($cookieName, $cookieValue);

            if ($result) {
                return false;
            }
        }

        return $cookieName;
    }
}
