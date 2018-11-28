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

        $preciod = DB::table('precios')->where([['comuna_id', $request->input('comuna')],['tviaje_id', $request->input('tviaje')],])->first();
        $success = "El costo es ".$preciod->precio;
        
        /*return view('index')->with('slider', $slider);*/
        return view('index', compact('slider','vehicles','comunas', 'tposviaje', 'success'));
    }
}
