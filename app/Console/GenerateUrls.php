<?php

namespace App\Console;

use App\Entities\Language;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateUrls extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'nps:url';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate url's";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $languages = Language::all();

        $langArray = [];

        $languages->each(function ($language) use (&$langArray) {
            for ($i = 1; $i <= 3; $i++) {
                array_push($langArray, env('APP_URL') . "/answer?lang=" . $language->locale . "&event=" . $i . "&hash=" . md5($language->locale . $i));
            }
        });

        foreach ($langArray as $item) {
            echo $item . '\n';
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [

        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
