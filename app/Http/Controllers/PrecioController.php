<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Precio;
use App\Tviaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios = Precio::all();

        return view('precio.index', compact('precios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunas = Comuna::all();
        $precios = Precio::all();
        $tviajes = Tviaje::all();

        return view('precio.create', compact('tviajes','precios','comunas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['comuna' => 'required', 'precio' => 'required', 'tposviajei' => 'required']);

        $temp2 = new Precio();
        $temp2->comuna()->associate($request->get('comuna'));
        $temp2->tviaje()->associate($request->get('tposviajei'));
        $temp2->precio = $request->get('precio');
        $temp2->descripcion = $request->get('description');
        $temp2->save();

        return redirect()->route('precios.index')->with('success', 'Servicio de Transfer/Tour añadido');
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
        $precios = Precio::find($id);
        $comunas = Comuna::all();
        $tviajes = Tviaje::all();

        return view('precio.edit', compact('tviajes','precios','comunas'));
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
        $request->validate(['comuna' => 'required', 'precio' => 'required', 'description' => 'required', 'tposviajei' => 'required']);

        $precioact = DB::table('precios')->where([['comuna_id', $request->input('comuna')],['tviaje_id', $request->input('tposviajei')],])->first();

        if($precioact){
            return redirect()->route('precios.index')->with('success', 'El registro No fue actualizado porque esa combinacion ya existe.');            
        }

        Precio::find($id)->update($request->all());

        return redirect()->route('precios.index')->with('success', 'Actualizado los datos del precio.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfer = DB::table('transfers')->where('precio_id', $id)->first();

        if($transfer){
            return redirect()->route('precios.index')->with('success','No se puede eliminar el registro porque se esta utilizando en los transfer');
        }else{
            Precio::find($id)->delete();
            
            return redirect()->route('precios.index')->with('success', 'Eliminado el registro exitosamente.');
        }
    }
}
