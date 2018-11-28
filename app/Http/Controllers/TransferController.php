<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\Vehicle;
use App\Comuna;
use App\Precio;
use App\Tviaje;
use App\Passenger;
use App\Servicio;
use App\Transvcio;
use App\Mail\TransferMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
/*use Illuminate\Support\Facades\Mail;*/

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::all();
        $precios = Precio::all();
        $comunas = Comuna::all();

        
        return view('transfer.index', compact('transfers','precios','comunas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if( Auth::check() ){
            $vehicles = Vehicle::all();
            $comunas = Comuna::all();
            $tposviaje = Tviaje::all();

            $form_data = null;

            if( $request->session()->has('transfer_form')){
                $form_data = $request->session()->pull('transfer_form');
            }

            return view('transfer.create', compact('form_data', 'vehicles','comunas', 'tposviaje'));
        }else{
            //$request->validate(['vehicle' => 'required', 'comuna' => 'required']);
            $request->session()->put('transfer_form', $request->all());

            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['vehicle' => 'required', 'comuna' => 'required', 'tviaje' => 'required', 'name' => 'required', 'email' => 'required|email', 'date' => 'required|date', 'time' => 'required']);

        $comuna = $request->input('comuna');
        $tviaje = $request->input('tviaje');

        

        $servicio = DB::table('servicios')->where('id', 3)->first();

        $cuotaPax = 0;
        if($request->input('passenger') > 4){
            $cuotaPax = ($request->input('passenger') - 4) * $servicio->price;
        }

        

        $serviciog = DB::table('servicios')->where('id', 2)->first();

        $cuotaGuia = 0;
        if($request->input('sguia') == 1 ){
            $cuotaGuia = $serviciog->price;
        }



        $preciod = DB::table('precios')->where([['comuna_id', $comuna],['tviaje_id', $tviaje],])->first();

        $temp = new Transfer();
        $temp->vehicle()->associate($request->get('vehicle'));

        /*$temp->comuna()->associate($request->get('comuna'));*/

        $temp->precio_id = $preciod->id;
        $temp->user()->associate($request->user()->id);
        $temp->name = $request->get('name');
        $temp->email = $request->get('email');
        $temp->passengers = $request->input('passenger');
        $temp->date_pick = $request->get('date');
        $temp->time_pick = $request->get('time');
        $total = $preciod->precio + $cuotaPax + $cuotaGuia;
        $temp->price = $total;
        $temp->save();


        $transfer = DB::table('transfers')->where([['vehicle_id', $request->get('vehicle')], ['user_id', $request->user()->id],['precio_id', $preciod->id], ['name', $request->get('name')], ['email', $request->get('email')], ['passengers', $request->input('passenger')], ['price', $total], ['date_pick', $request->get('date')], ['time_pick', $request->get('time')],])->latest()->first();

        if($cuotaPax != 0){
            $tserv = new Transvcio();
            $tserv->servicio()->associate($servicio->id);
            $tserv->transfer()->associate($transfer->id);
            $tserv->save();
        }

        if($cuotaGuia != 0){
            $tserv = new Transvcio();
            $tserv->servicio()->associate($serviciog->id);
            $tserv->transfer()->associate($transfer->id);
            $tserv->save();
        }

        /*Mail::to($request->get('email'))->send(new Transfer($request->get('name')));*/
        //\Mail::to('angelica.informatik@gmail.com')->send(new TransferMail($request->get('email')));

        return redirect()->route('transfer.create')->with('success', 'Se envió el formulario.  El total fue de: '.$total);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transfer = Transfer::find($id);
        $vehicles = Vehicle::all();
        $comunas = Comuna::all();

        return view('transfer.edit', compact('transfer', 'vehicles', 'comunas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['vehicle' => 'required', 'comuna' => 'required', 'name' => 'required', 'email' => 'required|email', 'date' => 'required|date', 'time' => 'required']);

        $comuna = $request->input('comuna');
        $tviaje = $request->input('tviaje');
        $preciod = DB::table('precios')->where([['comuna_id', $comuna],['tviaje_id', $tviaje],])->first();


        $temp = Transfer::find($id);
        $temp->vehicle()->associate($request->get('vehicle'));
        /*$temp->comuna()->associate($request->get('comuna'));*/
        $temp->precio_id = $preciod->id;
        $temp->name = $request->get('name');
        $temp->email = $request->get('email');
        $temp->date_pick = $request->get('date');
        $temp->time_pick = $request->get('time');
        //$temp->price = $request->get('price');
        $temp->save();

        return redirect()->route('transfer.index')->with('success', 'Se actualizó los datos del Transfer.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }

    public function ContactForm(Request $request)
    {
        if( Auth::check() ){
            if( $request->session()->has('transfer_form')){
                $array = $request->session()->pull('transfer_form');
                return view('transfer.contact')->with('form_data', $array);
            }else{
                $request->validate(['vehicle' => 'required', 'comuna' => 'required']);
                $form_data = $request->all();
                $comu = Comuna::find($form_data['comuna']);
                $tviaj = Tviaje::find($form_data['tviaje']);
                $veh = Vehicle::find($form_data['vehicle']);
                $servs = Servicio::all();
                $preciod = DB::table('precios')->where([['comuna_id', $comu->id],['tviaje_id', $tviaj->id],])->first();

                return view('transfer.contact', compact('form_data', 'comu', 'tviaj', 'veh', 'preciod', 'servs'));
                /*return view('transfer.contact')->with('form_data', $request->all());*/
            }
        }else{
            $request->validate(['name' => 'required', 'vehicle' => 'required', 'comuna' => 'required']);
            $request->session()->put('transfer_form', $request->all());

            return redirect()->route('login');
        }
    }
}