<?php

namespace App\Http\Controllers;

use App\Comuna;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunas = Comuna::all();

        return view('comuna.index')->with('comunas', $comunas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comuna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'price' => 'required', 'description' => 'required']);

        Comuna::create($request->all());

        return redirect()->route('comuna.index')->with('success', 'Comuna añadida');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function show(Comuna $comuna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function edit(Comuna $comuna)
    {
        return view('comuna.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required', 'description' => 'required', 'price' => 'required']);

        Comuna::find($id)->update($request->all());
        
        return redirect()->route('comuna.index')->wit('success', 'Actualizado los datos de la comuna.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comuna  $comuna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comuna::find($id)->delete();

        return redirect()->route('comuna.index')->with('success', 'Eliminada la Comuna.');
    }
}
