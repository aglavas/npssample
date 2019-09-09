<?php

namespace App\Http\Controllers;

use App\Entities\AnswerTracking;
use App\Contracts\AnswerContact;
use App\Entities\Answer;
use App\Entities\Label;
use App\Entities\Question;
use App\Entities\Survey;
use App\Http\Requests\AnswerGetRequest;
use App\Http\Requests\AnswerStoreRequest;
use Illuminate\Http\Response;

class AnswerController extends Controller
{
    /**
     * @param AnswerGetRequest $request
     * @param Question $question
     * @param Label $label
     * @param AnswerContact $answerContact
     * @return Response
     */
    public function index(AnswerGetRequest $request, Question $question, Label $label, AnswerContact $answerContact)
    {
        $result = $answerContact->prepareAnswerViewData($request, $question, $label);

        $lang = $request->input('lang');
        $event = $request->input('event');

        $cookieName = "nps-answer-$lang-$event";

        if ($request->hasCookie($cookieName) == true) {
            $response = new Response(view('answer.answer')->with($result));
        } else {
            $response = new Response(view('answer.answer')->with($result));
            $response->withCookie(cookie($cookieName, substr(str_shuffle(MD5(microtime())), 0, 20), time() + (10 * 365 * 24 * 60 * 60)));
        }

        return $response;
    }

    /**
     * Store answer entity
     *
     * @param AnswerStoreRequest $request
     * @param Answer $answer
     * @param Survey $survey
     * @param AnswerContact $answerContact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(AnswerStoreRequest $request, Answer $answer, Survey $survey, AnswerContact $answerContact, AnswerTracking $answerTracking)
    {
        $lang = $request->input('lang');
        $event = $request->input('event');

        $cookieName = "nps-answer-$lang-$event";

        if ($request->hasCookie($cookieName) == false) {
            abort(403);
        } else {
            $result = $answerTracking->where('cookie_name', $cookieName)->where('cookie_value', $request->cookie($cookieName))->count();

            if ($result) {
                abort(403);
            }
        }

        try {
            $answerContact->createAnswer($request, $survey, $answerTracking, $cookieName);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'There was an unexpected error while saving feedback.');
        }

        return view('answer.success');
    }
}
