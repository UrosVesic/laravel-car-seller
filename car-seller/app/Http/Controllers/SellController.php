<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Http\Resources\SellResource;
use App\Http\Resources\SellCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = Sell::all();
       return new SellCollection($sells);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|integer',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $sell = Sell::create([
            'car_id' => $request->car_id,
            'user_id' => Auth::user()->id,
            'sold_at' => $request->sold_at,

        ]);

        return response()->json(['Sell is created successfully.', new SellResource($sell)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
       return new SellResource($sell);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sell $sell)
    {
        $validator = Validator::make($request->all(), [
            'car_id' => 'required',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

            $sell->car_id = $request->car_id;
            $sell->sold_at = $request->sold_at;

            $sell->save();


        return response()->json(['Sell is updated successfully.', new SellResource($sell)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        return response()->json(['Sell is deleted successfully'],new SellResource($sell));
    }
}
