<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Services\ZipCodeService;
use Illuminate\Http\JsonResponse;

class QuoteController extends Controller
{
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

        return response()->json(['rate' => $rate]);
    }
}
