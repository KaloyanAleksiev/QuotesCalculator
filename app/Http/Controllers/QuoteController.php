<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use Illuminate\Http\JsonResponse;

class QuoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param QuoteRequest $request
     * @return JsonResponse
     */
    public function store(QuoteRequest $request): JsonResponse
    {
//        dd($request->toArray());
        return response()->json($request->toArray());
    }
}
