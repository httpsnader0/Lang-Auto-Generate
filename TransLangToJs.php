<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TransLangToJs extends Command
{
    protected $languages = [
        'ar',
        'en',
    ];

    protected $signature = 'lang:run';

    protected $description = 'Translate Language Folder From PHP To JS';

    public function handle()
    {
        $this->output->progressStart(count($this->languages));

        foreach ($this->languages as $lang) {

            app()->setLocale($lang);

            $path = lang_path($lang);

            $collection = collect(File::allFiles($path))->flatMap(function ($file, $lang) {
                return [($translation = $file->getBasename('.php')) => trans($translation, array(), null, $lang)];
            });

            $jsonFile = File::get(lang_path($lang . '.json'));
            foreach (json_decode($jsonFile) as $key => $value) {
                $collection->put($key, $value);
            }

            $data = 'export default ' . json_encode($collection->toArray());

            file_put_contents(resource_path("js/Locale/{$lang}.js"), $data);

            $this->output->progressAdvance();

        }

        $this->output->progressFinish();
    }
}
