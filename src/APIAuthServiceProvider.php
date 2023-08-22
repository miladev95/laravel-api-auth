<?php

namespace Miladev\APIAuth;

use Illuminate\Support\ServiceProvider;
class APIAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $stubsDirectory = __DIR__ . '/stubs';
        $requestFiles = glob("$stubsDirectory/*Request.stub");
        foreach ($requestFiles as $file) {
            $fileName = pathinfo($file,PATHINFO_FILENAME);
            $this->publishes([
                __DIR__."/stubs/$fileName.stub" => app_path("Http/Requests/$fileName.php"),
            ], 'stubs');
        }
    }

    public function register()
    {

    }
}
