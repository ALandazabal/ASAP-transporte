<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\Vehicle;
use App\Comuna;
use App\Precio;
use App\Tviaje;
use App\Passenger;
use App\Servicio;
use App\Statetf;
use App\Statetransfer;
use App\Transvcio;
use App\User;
use App\Mail\TransferMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Mail;

/*use Transbank\Webpay\configuration;
use Transbank\Webpay\webpay;*/

include '../vendor/autoload.php';
use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;/**/
/*use Illuminate\Support\Facades\Mail;*/

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $email = $request->get('emailb');
        $destino = $request->get('destinob');
        $finicial = $request->get('finicial');

        $transfers = null;

        if($email != ''){
            $userid = User::where('email', $email)->first();
            if($userid != ''){
                $transfers = Transfer::where('user_id', $userid->id)->get();
            }/*else{
                $transfers = Transfer::all()->sortBy('id'); 
            }*/
        }else if($destino != ''){
            $comunaid = Comuna::where('name', $destino)->first();
            if($comunaid != ''){
                $precioid = Precio::where('comuna_id', $comunaid->id)->get();

                if($precioid != ''){
                    $transfers = Transfer::whereIn('precio_id', $precioid)->get();
                }/*else{
                    $transfers = Transfer::all()->sortBy('id'); 
                    //$transfers = Transfer::find($precioid);

                }*/
            }/*else{
                $transfers = Transfer::all()->sortBy('id'); 
            }*/
        }else if($finicial != ''){
            $transfers = Transfer::whereDate('date_pick', '>=', $finicial)->get();
        }else{
            $transfers = Transfer::all()->sortByDesc('id');            
        }
        /*$transfers = Transfer::orderBy('id', 'DESC')->searchEmail('admmin');*/
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
            /*$vehicles = Vehicle::all();*/
            $vehicles = Vehicle::where('id', 1)->first();
            $comunas = Comuna::all();
            $tposviaje = Tviaje::all();
            $passengers = Passenger::all();

            $form_data = null;

            if( $request->session()->has('transfer_form')){
                $form_data = $request->session()->pull('transfer_form');
            }

            return view('transfer.create', compact('form_data', 'vehicles','comunas', 'tposviaje', 'passengers'));
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
        $request->validate(['vehicle' => 'required', 'origin' => 'required', 'comuna' => 'required', 'tviaje' => 'required', 'name' => 'required', 'email' => 'required|email', 'date' => 'required|date', 'time' => 'required']);

        if($request->input('origin') != 0 ){
            $comuna = $request->input('origin');
        }else{
            $comuna = $request->input('comuna'); 
        }
        $tviaje = $request->input('tviaje');

        

        $servicio = DB::table('servicios')->where('id', 3)->first();

        $temppax = DB::table('passengers')->where('id', $request->input('passenger'))->first();
        $pax = explode(" ", $temppax->descripcion);

        $cuotaPax = 0;
        if($tviaje != 1){
            $cuotaPax = $temppax->precio;
        }else{
            if($pax[0] > 4){
                $cuotaPax = ($pax[0] - 4) * $servicio->price;
            }
        }

        /*$cuotaPax = 0;
        if($request->input('passenger') > 4){
            $cuotaPax = ($request->input('passenger') - 4) * $servicio->price;
        }*/


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
        $temp->suitcase = $request->input('suitcase');
        $temp->date_pick = $request->get('date');
        $temp->time_pick = $request->get('time');
        $total = $preciod->precio + $cuotaPax + $cuotaGuia;
        $temp->price = $total;
        $temp->save();


        $transfer = DB::table('transfers')->where([['vehicle_id', $request->get('vehicle')], ['user_id', $request->user()->id],['precio_id', $preciod->id], ['name', $request->get('name')], ['email', $request->get('email')], ['passengers', $request->input('passenger')], ['suitcase', $request->input('suitcase')], ['price', $total], ['date_pick', $request->get('date')], ['time_pick', $request->get('time')],])->latest()->first();

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

        //State table
        $state = new Statetransfer();
        $state->statetf()->associate(1);
        $state->transfer()->associate($transfer->id);
        $state->save();

        if($request->input('pago') == 'webpay'){            

            // Obtenemos los certificados y llaves para utilizar el ambiente de integración de Webpay Normal.
            $bag = CertificationBagFactory::integrationWebpayNormal();

            $webpay = TransbankServiceFactory::normal($bag);

            // Para transacciones normales, solo puedes añadir una linea de detalle de transacción.
            $webpay->addTransactionDetail($total, $transfer->id); // Monto e identificador de la orden

            // Debes además, registrar las URLs a las cuales volverá el cliente durante y después del flujo de Webpay
            /*$response = $webpay->initTransaction('http://asap.entunegocio.cl/transfer/pagar', 'http://asap.entunegocio.cl/transfer/result');*/
            $response = $webpay->initTransaction('http://localhost:8000/pagar', 'http://asap.entunegocio.cl/transfer/result');

            // Utilidad para generar formulario y realizar redirección POST
            echo RedirectorHelper::redirectHTML($response->url, $response->token);
        }

        /*Mail::to($request->get('email'))->send(new Transfer($request->get('name')));*/
        //Mail::to($request->get('email'))->send(new TransferMail());

        $viaje = Tviaje::find($tviaje);
        $date = date("d/m/Y", strtotime($request->get('date')))." ".$request->get('time');
        $from = Comuna::find($request->get('origin'));
        $to = Comuna::find($request->get('comuna'));

        $mail = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'type' => $viaje->descripcion,
            'date' => $date,
            'from' => $from->name,
            'to' => $to->name,
            'description' => $preciod->descripcion,
            'suitcase' => $request->input('suitcase'),
            'travelprice' => number_format($preciod->precio,0,',','.'),
            'passengers' => $pax[0],
            'passengerprice' => number_format($cuotaPax,0,',','.'),
            'guideprice' => number_format($cuotaGuia,0,',','.'),
            'total' => number_format($total,0,',','.')
        );

        /*Mail::send('mails.transfermail', $request->all(), function($msj){*/
        Mail::send('mails.transfermail', $mail, function($msj){
            $msj->subject('Pago de servicio realizado');
            $msj->from('info@transportesasap.cl');
            $msj->to($request->get('email'));
            $msj->cc('info@transportesasap.cl');
        });

        //\Mail::to('angelica.informatik@gmail.com')->send(new TransferMail($request->get('email')));

        //return redirect()->route('transfer.create')->with('success', 'Se envió el formulario.  El total fue de: '.$total);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transfer = Transfer::find($id);
        $vehicles = Vehicle::all();
        $comunas = Comuna::all();

        $status = Statetransfer::where('transfer_id', $id)->latest()->first();

        return view('transfer.show', compact('transfer', 'vehicles', 'comunas', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transfer = Transfer::find(Crypt::decrypt($id));
        $vehicles = Vehicle::all();
        $comunas = Comuna::all();
        $tviajes = Tviaje::all();
        $estados = Statetf::all();

        $status = Statetransfer::where('transfer_id', Crypt::decrypt($id))->latest()->first();

        if($transfer->user->role_id == 1){
            return view('transfer.edit', compact('transfer', 'vehicles', 'comunas', 'tviajes', 'estados', 'status'));
        }else{
            return view('transfer.editu', compact('transfer', 'vehicles', 'comunas', 'tviajes', 'estados', 'status'));
        }

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

        //State table
        $state = new Statetransfer();
        $state->statetf()->associate($request->get('status'));
        $state->transfer()->associate($id);
        $state->save();

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
                $request->validate(['vehicle' => 'required', 'comunat' => 'required']);
                $form_data = $request->all();
                if($form_data['origin2'] == 0){
                    $origen = Comuna::find(0);
                    $destino = Comuna::find($form_data['comunat']);
                    $comu = Comuna::find($form_data['comunat']);
                }else{
                    $origen = Comuna::find($form_data['origin2']);
                    $destino = Comuna::find(0);
                    $comu = Comuna::find($form_data['origin2']);
                }
                $tviaj = Tviaje::find($form_data['tviajet']);
                $veh = Vehicle::find($form_data['vehicle']);
                $servs = Servicio::all();


                $paxtra = Servicio::find(3);
                $temppax = Passenger::find($form_data['passenger']);
                $pax = explode(" ", $temppax->descripcion);

                $cuotaPax = 0;
                if($form_data['tviajet'] == 1){
                    $cuotaPax = $temppax->precio;
                }else{
                    if($pax[0] > 4){
                        $cuotaPax = ($pax[0] - 4) * $paxtra->price;
                    }
                }

                $preciod = DB::table('precios')->where([['comuna_id', $comu->id],['tviaje_id', $tviaj->id],])->first();

                return view('transfer.contact', compact('form_data', 'origen', 'destino', 'tviaj', 'veh', 'preciod', 'servs', 'cuotaPax'));
                /*return view('transfer.contact')->with('form_data', $request->all());*/
            }
        }else{
            $request->validate(['name' => 'required', 'vehicle' => 'required', 'comuna' => 'required']);
            $request->session()->put('transfer_form', $request->all());

            return redirect()->route('login');
        }
    }

    public function result()
    {
        $vehicles = Vehicle::all();
        $comunas = Comuna::all();
        $tposviaje = Tviaje::all();

        $form_data = null;
        return view('transfer.create', compact('form_data', 'vehicles','comunas', 'tposviaje'));
    }

    public function indexu(Request $request)
    {
        
        $destino = $request->get('destinob');
        $finicial = $request->get('finicial');

        $transfers = null;

        if($destino != ''){
            $comunaid = Comuna::where('name', $destino)->first();
            if($comunaid != ''){
                $precioid = Precio::where('comuna_id', $comunaid->id)->get();

                if($precioid != ''){
                    $transfers = Transfer::where('user_id', Auth::user()->id)->whereIn('precio_id', $precioid)->get();
                    /*$comunaid = DB::table('transfers')->where([['precio_id', $precioid],['tviaje_id', $tviaje],])->first();*/
                }
            }
        }else if($finicial != ''){
            $transfers = Transfer::where('user_id', Auth::user()->id)->whereDate('date_pick', '>=', $finicial)->get();
        }else{
            /*$transfers = Transfer::all()->sortByDesc('id');*/            
            $transfers = Transfer::where('user_id', Auth::user()->id)->get()->sortByDesc('id'); 
        }

        $precios = Precio::all();
        $comunas = Comuna::all();

        
        return view('transfer.indexu', compact('transfers','precios','comunas'));
    }

    public function cancel(Request $request, $id)
    {
        //State table
        $state = new Statetransfer();
        $state->statetf()->associate(4);
        $state->transfer()->associate($request->get('id'));
        $state->save();

        return redirect()->route('transfer.indexu')->with('success', 'Se actualizó los datos del Transfer.');
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