<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerStoreRequest extends FormRequest
{
    /**
     * Authorize
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Rules
     *
     * @return array
     */
    public function rules()
    {
        $rating = $this->input('rating');

        $rules = [
            'lang' => 'required|string|exists:languages,locale',
            'event' => 'required|integer|in:1,2,3',
            'hash' => 'required|string|checkHashIntegrity:' . $this->input('lang') . ',' . $this->input('event'),
            'rating' => 'required|in:1,2,3,4,5,6,7,8,9,10',
        ];

        $additionalRules = [];

        if (($rating < 7) && ($rating != null)) {
            $additionalRules['label_id'] = 'required|exists:labels,id';
            $additionalRules['content'] = 'required|string';
        }

        $allRules = array_merge($rules, $additionalRules);

        return $allRules;
    }
}
