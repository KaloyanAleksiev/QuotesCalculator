<?php


namespace App\Repositories\States;


use App\Models\State;
use App\Repositories\Interfaces\States\StateRepositoryInterface;

class StateRepository implements StateRepositoryInterface
{
    private $model;

    public function __construct(State $state)
    {
        $this->model = $state;
    }

    public function getStateCoefficient(string $stateCode): ?State
    {
        return $this->model->select(['coefficient'])->where('code', $stateCode)->first();
    }
}
