<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilters
{
    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The builder instance.
     *
     * @var Builder
     */
    protected $builder;

    protected $related = null;

    /**
     * Create a new QueryFilters instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply the filters to the builder.
     *
     * @param  Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        if ($this->related) {
            $this->builder->where($this->related['field'], '=', $this->related['value']);
        }

        foreach ($this->filters() as $name => $value) {
            if (!method_exists($this, $name)) {
                continue;
            }

            if ($value === null) {
                $value = '';
            }

            if ($value || strlen($value) || empty($value)) {
                $this->$name($value);
            } elseif (is_null($value)) {
                $this->$name();
            }
        }

        return $this->builder;
    }

    /**
     * Get all request filters data.
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->input();
    }
}
