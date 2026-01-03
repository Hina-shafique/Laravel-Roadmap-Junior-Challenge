<?php

namespace App\Exceptions;

use Exception;

class TaskException extends Exception
{
    public function __construct(string $message = "")
    {
        if ($message) {
            $this->message = $message;
        }
    }
    
}
