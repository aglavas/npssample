<?php

namespace App\Services;

use App\Entities\Language;

class LanguageConfig
{
    /**
     * Get lang config
     *
     * @return Language[]|\Illuminate\Database\Eloquent\Collection
     */
    static public function get()
    {
        $languages = Language::all();

        return $languages;
    }
}
