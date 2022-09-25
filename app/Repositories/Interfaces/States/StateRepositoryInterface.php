<?php


namespace App\Repositories\Interfaces\States;


use App\Models\State;

interface StateRepositoryInterface
{
    public function getStateCoefficient(string $stateCode): ?State;
}
