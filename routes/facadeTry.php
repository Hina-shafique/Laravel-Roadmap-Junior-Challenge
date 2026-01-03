<?php

use Illuminate\Support\Facades\Route;
use CustomeFacades\App\Services\TaskActivityServices;
use Illuminate\Support\Str;

spl_autoload_register(function ($name) {
    if (Str::startsWith($name, 'CustomeFacades')) {

        $stub = file_get_contents(app_path('Facades.stub'));
        $namespace = str_replace('/', '\\', dirname(str_replace('\\', '/', $name)));
        $classname = class_basename($name);
        $accessor = str_replace('CustomeFacades', '', $namespace) . '\\' . $classname;

        $stub = str_replace(
            ['{namespace}', '{className}', '{accessor}'],
            [
                $namespace,
                $classname,
                $accessor,
            ],
            $stub
        );

        file_put_contents($path = app_path( $classname . 'Facade.php'), $stub);

        require $path;
    }
});

Route::get('/facade', function () {
    return TaskActivityServices::logActivity('something');
});