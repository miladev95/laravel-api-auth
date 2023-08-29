<?php

namespace Miladev\APIAuth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class APIAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
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

        $content = file_get_contents(base_path("routes/$fileName"));

        // check if content already copied
        if ($content !== false) {
            if (strpos($content, '/signup') === false) {
                $targetFilePath = base_path("routes/$fileName.php");
                $contentsToAppend = file_get_contents(__DIR__ . "/stubs/$fileName.stub");
                file_put_contents($targetFilePath, $contentsToAppend, FILE_APPEND);
            }
        } else {
            echo 'Failed to fetch the content.';
        }
    }

    public function register()
    {

    }
}
