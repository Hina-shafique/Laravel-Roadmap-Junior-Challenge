<?php 

namespace CustomeFacades\App\Services;

use Illuminate\Support\Facades\Facade;

class TaskActivityServices extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return '\App\Services\TaskActivityServices';
    }
}