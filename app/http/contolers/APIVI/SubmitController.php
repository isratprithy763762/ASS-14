<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Submit;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubmitRequest;
use App\Http\Requests\UpdateSubmitRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): JsonResponse
    {
        $email = $request->input('email');

        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubmitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Submit $submit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submit $submit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubmitRequest $request, Submit $submit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submit $submit)
    {
        //
    }
}