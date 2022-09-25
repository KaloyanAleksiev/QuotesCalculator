<?php


namespace App\Repositories\Quotes;


use App\Models\Quote;
use App\Repositories\Interfaces\Quote\QuoteRepositoryInterface;

class QuoteRepository implements QuoteRepositoryInterface
{
    public function create($data): Quote
    {
        $quote = Quote::create($data);

        $quote->save();

        return $quote;
    }
}
