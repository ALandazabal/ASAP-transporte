<?php

namespace App\Http\Controllers;

use App\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passengers = Passenger::all();

        return view('passenger.index')->with('passengers', $passengers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passenger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['descripcion' => 'required', 'precio' => 'required']);

        $temp = new Passenger();
        $temp->descripcion = $request->get('descripcion');
        $temp->precio = $request->get('precio');
        $temp->save();

        return redirect()->route('passenger.index')->with('success', 'Pasajero añadido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $passenger = Passenger::find($id);

        return view('passenger.edit', compact('passenger'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['descripcion' => 'required', 'precio' => 'required']);

        Passenger::find($id)->update($request->all());
        
        return redirect()->route('passenger.index')->with('success', 'Actualizado los datos del pasajero.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Passenger::find($id)->delete();
                
        return redirect()->route('passenger.index')->with('success', 'Eliminado el pasajero exitosamente.');
    }
}
