<?php


namespace App\Repositories\Interfaces\Quote;


use App\Models\Quote;

interface QuoteRepositoryInterface
{
    public function create($data): Quote;
}
