<?php

use App\Exceptions\TaskException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
    then: function () {
      Route::middleware('web')
        ->group(base_path('routes/facadeTry.php'));
    }
  )
  ->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
      'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
      'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
      'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
      'ReplaceText' => \App\Http\Middleware\ReplaceText::class,
    ]);

  })
  ->withExceptions(function (Exceptions $exceptions): void {
    $exceptions->report(function (TaskException $e) {
      logger()->error('Invalid entry: ' . $e->getMessage());
      redirect('view-errorPage');
    });

    $exceptions->dontReportDuplicates();
  })->create();
