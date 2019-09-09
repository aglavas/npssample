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

    /**
     * Filter answers by score
     *
     * @param $score
     */
    public function score($score)
    {
        if ($score === 'promoters') {
            $this->builder->where('rating', '>=', 7);
        } elseif ($score === 'passives') {
            $this->builder->where('rating', '<', 7)->where('rating', '>=', 4);
        } elseif ($score === 'detractors') {
            $this->builder->where('rating', '<', 4);
        } elseif ($score === 'all') {
            $this->builder->where('rating', '!=', '');
        }
    }

    /**
     * Filter answers by comment content
     *
     * @param $comments
     */
    public function comments($comments)
    {
        if ($comments === 'true') {
            $this->builder->where('content', '!=', '');
        }
    }

    /**
     * Filter answers by labels
     *
     * @param $labels
     */
    public function labels($labels)
    {
        if (is_array($labels)) {
            $this->builder->whereIn('label_id',  $labels);
        }
    }
}
