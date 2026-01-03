<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Container\Attributes\Scoped;

#[Scoped]
class TaskActivityServices
{
    protected string $requestId;

    public function __construct()
    {
        $this->requestId = uniqid('task_', true);
    }

    public function logActivity(string $message): void
    {
        Log::info($message . ' | request_id=' . $this->requestId);
    }
}
