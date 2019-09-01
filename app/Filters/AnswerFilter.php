<?php

namespace App\Filters;

use Illuminate\Http\Request;

class AnswerFilter extends QueryFilters
{
    /**
     * @var array
     */
    protected $related = [
        'field' => 'survey_id',
        'value' => null,
    ];

    /**
     * AnswerFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);

        if ($request->route('survey')) {
            $survey = $request->route('survey')->id;

            $this->related['value'] = $survey;
        }
    }

    /**
     * Filter answers by content
     *
     * @param $content
     */
    public function content($content)
    {
        $this->builder->where('content', 'like', '%' . $content . '%');
    }

    /**
     * Order by oldest
     *
     * @param $oldest
     */
    public function oldest($oldest)
    {
        $this->builder->oldest();
    }

    /**
     * Order by newest
     *
     * @param $newest
     */
    public function newest($newest)
    {
        $this->builder->latest();
    }
}
