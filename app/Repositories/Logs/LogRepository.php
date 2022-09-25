<?php


namespace App\Repositories\Logs;


use App\Models\Log;
use App\Repositories\Interfaces\Logs\LogRepositoryInterface;

class LogRepository implements LogRepositoryInterface
{
    public function create($data): Log
    {
        $log = Log::create($data);

        $log->save();

        return $log;
    }
}
