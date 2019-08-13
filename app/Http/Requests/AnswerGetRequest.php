<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerGetRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lang' => 'required|string|exists:languages,locale',
            'event' => 'required|integer|in:1,2,3',
            'hash' => 'required|string|checkHashIntegrity:' . $this->input('lang') . ',' . $this->input('event')
        ];
    }

}
