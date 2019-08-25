<?php

namespace App\Entities;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use Filterable;

    protected $fillable = ['survey_id', 'content', 'rating', 'label_id'];

    protected $with = ['label'];

    /**
     * Answer belongs to survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }

    /**
     * Answer belongs to label
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function label()
    {
        return $this->belongsTo(Label::class, 'label_id', 'id');
    }
}
