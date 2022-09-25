<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Repositories\Interfaces\Quote\QuoteRepositoryInterface;
use App\Repositories\Interfaces\States\StateRepositoryInterface;
use App\Services\ZipCodeService;
use Illuminate\Http\JsonResponse;

class QuoteController extends Controller
{
    private QuoteRepositoryInterface $quoteRepository;
    private StateRepositoryInterface $stateRepository;

    public function __construct(QuoteRepositoryInterface $quoteRepository, StateRepositoryInterface $stateRepository)
    {
        $this->quoteRepository = $quoteRepository;
        $this->stateRepository = $stateRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuoteRequest $request
     * @param ZipCodeService $zipCodeService
     * @return JsonResponse
     */
    public function store(QuoteRequest $request, ZipCodeService $zipCodeService): JsonResponse
    {
        $distance = $zipCodeService->getDistance($request->ship_from, $request->deliver_to);
        $rate = number_format($distance * config('sgt.price_per_mile'), 2,'.', '');

        $enclosed = $request->transport;
        if ($enclosed) {
            $state = $this->stateRepository->getStateCoefficient($zipCodeService->getStateCode($request->ship_from));
            $enclosed = number_format(($state->coefficient ?? config('sgt.usa_enclosed_coefficient') / 3) * $rate, 2,'.', '');
            $rate = number_format((float)$rate + (float)$enclosed, 2,'.', '');
        }

        $this->quoteRepository->create(array_merge($request->all(), ['distance' => $distance, 'rate' => $rate]));

        return response()->json(['rate' => $rate, 'enclosed' => $enclosed]);
    }
}
