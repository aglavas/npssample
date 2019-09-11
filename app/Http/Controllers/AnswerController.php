<?php

namespace App\Http\Controllers;

use App\Contracts\AnswerTrackingContract;
use App\Contracts\AnswerContract;
use App\Entities\Label;
use App\Entities\Question;
use App\Entities\Survey;
use App\Http\Requests\AnswerGetRequest;
use App\Http\Requests\AnswerStoreRequest;
use App\Services\CookieManager;
use Illuminate\Http\Response;

class AnswerController extends Controller
{
    /**
     * Return live answer page
     *
     * @param AnswerGetRequest $request
     * @param Question $question
     * @param Label $label
     * @param AnswerContract $answerContact
     * @param CookieManager $cookieManager
     * @return Response
     */
    public function index(AnswerGetRequest $request, Question $question, Label $label, AnswerContract $answerContact, CookieManager $cookieManager)
    {
        $result = $answerContact->prepareAnswerViewData($request, $question, $label);

        $lang = $request->input('lang');
        $event = $request->input('event');

        $cookie = $cookieManager->addCookie($request, $event, $lang);

        $response = new Response(view('answer.answer')->with($result));

        if ($cookie) {
            $response->withCookie($cookie);
        }

        return $response;
    }

    /**
     * Store answer entity
     *
     * @param AnswerStoreRequest $request
     * @param Survey $survey
     * @param AnswerContract $answerContact
     * @param AnswerTrackingContract $trackingContract
     * @param CookieManager $cookieManager
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(AnswerStoreRequest $request, Survey $survey, AnswerContract $answerContact, AnswerTrackingContract $trackingContract, CookieManager $cookieManager)
    {
        $lang = $request->input('lang');
        $event = $request->input('event');

        $cookieName = $cookieManager->checkCookieTracking($request, $event, $lang, $trackingContract);

        if (!$cookieName) {
            abort(403);
        }

        try {
            $answerContact->createAnswer($request, $survey, $trackingContract, $cookieName);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'There was an unexpected error while saving feedback.');
        }

        return view('answer.success');
    }
}
