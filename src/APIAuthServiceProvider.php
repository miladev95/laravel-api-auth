<?php

namespace Miladev\APIAuth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class APIAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        echo "im here" . PHP_EOL;
        $stubsDirectory = __DIR__ . '/stubs';
        $requestFiles = glob("$stubsDirectory/*Request.stub");
        foreach ($requestFiles as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $this->publishes([
                __DIR__ . "/stubs/$fileName.stub" => app_path("Http/Requests/$fileName.php"),
            ], 'stubs');
        }

        $controllerFiles = glob("$stubsDirectory/*Controller.stub");
        foreach ($controllerFiles as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $this->publishes([
                __DIR__ . "/stubs/$fileName.stub" => app_path("Http/Controllers/API/$fileName.php"),
            ], 'stubs');
        }



        $routeFile = "$stubsDirectory/api.stub";
        $fileName = pathinfo($routeFile, PATHINFO_FILENAME);
        $targetFilePath = base_path("routes/$fileName.php");
        $contentsToAppend = file_get_contents(__DIR__ . "/stubs/$fileName.stub");
        file_put_contents($targetFilePath, $contentsToAppend, FILE_APPEND);

//        $this->publishes([
//            __DIR__ . "/stubs/$fileName.stub" => $targetFilePath,
//        ], 'stubs');

    }

    public function register()
    {

    }
}
