<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Vehicle::all();

        return view('vehicle.index')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['description' => 'required', 'passengers' => 'required']);

        $veh = new Vehicle();
        $veh->description = $request->input('description');
        $veh->passengers = $request->input('passengers');

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/carimages/', $name);
            $veh->photo = $name;
        }
        /*Vehicle::create($request->all());*/
        $veh->save();

        return redirect()->route('vehicle.index')->with('success', 'Vehículo Registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Vehicle::find($id);

        return view('vehicle.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['description' => 'required', 'passengers' => 'required']);

        $veh = Vehicle::find($id);
        $veh->description = $request->input('description');
        $veh->passengers = $request->input('passengers');

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/carimages/', $name);
            $veh->photo = $name;
        }
        /*Vehicle::create($request->all());*/
        $veh->save();

        return redirect()->route('vehicle.index')->with('success', 'Actualizado datos del Vehículo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle::find($id)->delete();
        return redirect()->route('vehicle.index')->with('success','Vehículo eliminado correctamente.');
    }
}
