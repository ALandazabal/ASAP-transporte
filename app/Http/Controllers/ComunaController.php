<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Precio;
use App\Tviaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $tposviajes = Tviaje::all();

        return view('comuna.create', compact('tposviajes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'precio' => 'required', 'description' => 'required', 'tposviajei' => 'required']);

        /*Comuna::create($request->all());*/
        $temp = new Comuna();
        $temp->name = $request->get('name');
        if($request->get('distance')){
            $temp->distance = $request->get('distance');
        }
        if($request->get('coords')){
            $temp->coords = $request->get('coords');
        }
        $temp->save();

        $precio = DB::table('comunas')->where('name', $request->get('name'))->latest()->first();

        $temp2 = new Precio();
        $temp2->comuna()->associate($precio->id);
        $temp2->tviaje()->associate($request->get('tposviajei'));
        $temp2->precio = $request->get('precio');
        $temp2->descripcion = $request->get('description');
        $temp2->save();

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
        $precio = DB::table('precios')->where('comuna_id', $id)->first();

        $transfer = DB::table('transfers')->where('precio_id', $precio->id)->first();

        if($transfer){
            return redirect()->route('comuna.index')->with('success','No se puede eliminar la comuna porque se tiene registro en los transfer');
        }else{
            Precio::find($precio)->delete();

            Comuna::find($id)->delete();
            
            return redirect()->route('comuna.index')->with('success', 'Eliminada la Comuna exitosamente.');
        }


    }
}
