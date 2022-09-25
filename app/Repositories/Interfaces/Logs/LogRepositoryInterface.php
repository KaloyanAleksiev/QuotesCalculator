<?php


namespace App\Repositories\Interfaces\Logs;


use App\Models\Log;

interface LogRepositoryInterface
{
    public function create($data): Log;
}
