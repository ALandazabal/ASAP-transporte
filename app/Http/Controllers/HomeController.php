<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\Slider;
use App\Tviaje;
use App\Vehicle;
use App\Precio;
use App\Passenger;
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
        $passengers = Passenger::all();
        
        /*return view('index')->with('slider', $slider);*/
        return view('index', compact('slider','vehicles','comunas', 'tposviaje', 'passengers'));
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
        $passengers = Passenger::all();
        $servicio = DB::table('servicios')->where('id', 3)->first();
        $waitService = DB::table('servicios')->where('id', 1)->first();

        if($request->input('comuna') == 0){
            $preciod = DB::table('precios')->where([['comuna_id', $request->input('origin2')],['tviaje_id', $request->input('tviaje')],])->first();
        }else{
            $preciod = DB::table('precios')->where([['comuna_id', $request->input('comuna')],['tviaje_id', $request->input('tviaje')],])->first();
        }

        $search = DB::table('tviajes')->where('id', $request->input('tviaje'))->first();
        $sviaje = $search->descripcion;

        if($request->input('comuna') == 0){
            $search = DB::table('comunas')->where('id', $request->input('origin2'))->first();
            $desde = "Aeropuerto Internacional Comodoro Arturo Medino Benítez";
            $hasta = $search->name;
        }else{
            $search = DB::table('comunas')->where('id', $request->input('comuna'))->first();
            $hasta = "Aeropuerto Internacional Comodoro Arturo Medino Benítez";
            $desde = $search->name;
        }

        $paxtra = $servicio->price;
        $waitser = $waitService->price;

        $temppax = DB::table('passengers')->where('id', $request->input('passenger'))->first();
        $pax = explode(" ", $temppax->descripcion);

        if($request->input('tviaje') == 1){
            $success = $preciod->precio+$temppax->precio;
        }else{
            $cuotaPax = 0;
            if($pax[0] > 4){
                $cuotaPax = ($pax[0] - 4) * $paxtra;
            }
            $success = $preciod->precio+$cuotaPax;
        }
                    
        /*return view('index')->with('slider', $slider);*/
        return view('index', compact('slider','vehicles','comunas', 'tposviaje', 'success', 'sviaje', 'desde','hasta', 'paxtra', 'waitser', 'passengers'));
    }

    public function getComunas(Request $request, $id){
        if($request->ajax()){
            $precio = Precio::servicioSelect($id);
            //$aux = $precio->comuna_id;
            $comunas = Comuna::whereIn('id', $precio)->get();
            return response()->json($comunas);
        }
    }
}
