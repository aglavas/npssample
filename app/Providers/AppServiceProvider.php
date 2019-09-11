<?php

namespace App\Providers;

use App\Contracts\AnswerContract;
use App\Contracts\AnswerTrackingContract;
use App\Contracts\SurveyContact;
use App\Repositories\AnswerRepository;
use App\Repositories\AnswerTrackingRepository;
use App\Repositories\SurveyRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SurveyContact::class, SurveyRepository::class);
        $this->app->bind(AnswerContract::class, AnswerRepository::class);
        $this->app->bind(AnswerTrackingContract::class, AnswerTrackingRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('languages')) {
            $languages = \App\Entities\Language::all();

            $localeArray = [];

            foreach ($languages as $language) {
                array_push($localeArray, $language->locale);
            }

            \Illuminate\Support\Facades\Config::set('translatable.locales', $localeArray);
            $locales = \Illuminate\Support\Facades\Config::get('translatable.locales');
        }

        Validator::extend('checkHashIntegrity', 'App\Validators\CustomValidator@checkHashIntegrity');
        Validator::replacer('checkHashIntegrity', 'App\Validators\CustomValidator@checkHashIntegrityReplacer');

        app('view')->addNamespace('errors', resource_path('views/errors'));
    }
}
