<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Slider;
use App\Tviaje;
use App\Vehicle;
use App\Precio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request){
        $slider = Slider::where('slider', true)->get();
        $vehicles = Vehicle::all();
        $comunas = Comuna::all();
        $tposviaje = Tviaje::all();
        
        /*return view('index')->with('slider', $slider);*/
        return view('index', compact('slider','vehicles','comunas', 'tposviaje'));
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    public function contizacionForm(Request $request)
    {
        $slider = Slider::where('slider', true)->get();
        $vehicles = Vehicle::all();
        $comunas = Comuna::all();
        $tposviaje = Tviaje::all();
        $servicio = DB::table('servicios')->where('id', 3)->first();

        $preciod = DB::table('precios')->where([['comuna_id', $request->input('comuna')],['tviaje_id', $request->input('tviaje')],])->first();

        $search = DB::table('tviajes')->where('id', $request->input('tviaje'))->first();
        $sviaje = $search->descripcion;

        $search = DB::table('comunas')->where('id', $request->input('comuna'))->first();
        $scomu = $search->name;

        $paxtra = $servicio->price;

        if(!$preciod){
            $success = "Lo sentimos, no hay precios para esta elección";
        }else{
            $cuotaPax = 0;
            if($request->input('passenger') > 4){
                $cuotaPax = ($request->input('passenger') - 4) * $paxtra;
            }
            $success = $preciod->precio+$cuotaPax;
        }
        
        /*return view('index')->with('slider', $slider);*/
        return view('index', compact('slider','vehicles','comunas', 'tposviaje', 'success', 'sviaje', 'scomu', 'paxtra'));
    }
}
