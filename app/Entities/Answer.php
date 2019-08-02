<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['survey_id', 'content', 'rating', 'label_id'];

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
        return $this->belongsTo(Label::class, 'survey_id', 'id');
    }
}
