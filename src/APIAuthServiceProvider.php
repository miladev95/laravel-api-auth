<?php

namespace Miladev\APIAuth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
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

        $controllerFiles = glob("$stubsDirectory/*Controller.stub");
        foreach ($controllerFiles as $file) {
            $fileName = pathinfo($file,PATHINFO_FILENAME);
            $this->publishes([
                __DIR__."/stubs/$fileName.stub" => app_path("Http/Controllers/API/$fileName.php"),
            ], 'stubs');
        }




        $routeFile = "$stubsDirectory/api.stub";
        $fileName = pathinfo($routeFile, PATHINFO_FILENAME);

        File::append(base_path("routes/$fileName.php"), File::get($routeFile));
    }

    public function register()
    {

    }
}
