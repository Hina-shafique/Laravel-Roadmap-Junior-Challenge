<?php 

namespace App\Services;

Class TaskDeadlineLimit
{
    public function maxLimit($deadline)
    {
        if($deadline > now()->addMonth())
        {
            throw new \Exception('Cannot set deadline beyond one month from today.');
        }
    }
}