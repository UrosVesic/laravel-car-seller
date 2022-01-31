<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Resources\CarResource;
use App\Http\Resources\CarCollection;
use App\Http\Resources\SellCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return new CarCollection($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'brand_id' => 'required|integer',
            'model'=> 'required|string',
            'cc'=>'required|integer',
            'hp'=>'required|integer'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $car = Car::create([
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'cc' => $request->cc,
            'hp' => $request->hp,
            

        ]);

        return response()->json(['Car is created successfully.', new CarResource($car)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return new CarResource($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $validator = Validator::make($request->all(), [
            'brand_id' => 'required|integer',
            'model'=> 'required|string',
            'cc'=>'required|integer',
            'hp'=>'required|integer'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

            $car->brand_id = $request->brand_id;
            $car->model = $request->model;
            $car->cc = $request->cc;
            $car->hp = $request->hp;

            $car->save();


        return response()->json(['Car is updated successfully.', new CarResource($sell)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(['Car deleted',new CarResource($car),'Sells deleted',new SellCollection($car->sells)]);
    }
}
