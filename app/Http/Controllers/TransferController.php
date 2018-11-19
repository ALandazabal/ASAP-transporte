<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\Vehicle;
use App\Comuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('transfer.index')->with('transfers', $transfers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $vehicles = Vehicle::all();
        $comunas = Comuna::all();

        return view('transfer.create', compact('vehicles','comunas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['vehicle' => 'required', 'comuna' => 'required', 'name' => 'required', 'email' => 'required|email', 'date' => 'required|date', 'time' => 'required']);

        $temp = new Transfer();
        $temp->vehicle()->associate($request->get('vehicle'));
        $temp->comuna()->associate($request->get('comuna'));
        $temp->user()->associate($request->user()->id);
        $temp->name = $request->get('name');
        $temp->email = $request->get('email');
        $temp->date_pick = $request->get('date');
        $temp->time_pick = $request->get('time');
        //$temp->price = $request->get('price');
        $temp->price = 100;
        $temp->save();

        return redirect()->route('transfer.create')->with('success', 'Se envió el formulario.');
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

        $temp = Transfer::find($id);
        $temp->vehicle()->associate($request->get('vehicle'));
        $temp->comuna()->associate($request->get('comuna'));
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
                return view('transfer.contact')->with('form_data', $request->all());
            }
        }else{
            $request->validate(['vehicle' => 'required', 'comuna' => 'required']);
            $request->session()->put('transfer_form', $request->all());

            return redirect()->route('login');
        }
    }
}
