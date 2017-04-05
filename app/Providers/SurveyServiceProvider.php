<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Helpers\Survey;

class SurveyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->bind('App\Helpers\SurveyClass', function ()  {

            return new \App\Helpers\SurveyClass();

        });

        $this->app->bind('App\Helpers\QuestionClass', function () {

            return new \App\Helpers\QuestionClass();

        });

        $this->app->bind('App\Helpers\SurveySupportClass', function () {

            return new \App\Helpers\SurveySupportClass();

        });

        $this->app->bind('App\Helpers\ReportClass', function () {

            return new \App\Helpers\ReportClass();

        });

    }
}
