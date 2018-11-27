<?php

use Illuminate\Database\Seeder;
use App\Servicio;

class ServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicio = new Servicio();
        $servicio->descripcion = 'Espera estacionamiento';
        $servicio->price = '4000';
        $servicio->save();

        $servicio = new Servicio();
        $servicio->descripcion = 'Servicio guia idioma';
        $servicio->price = '40000';
        $servicio->save();

        $servicio = new Servicio();
        $servicio->descripcion = 'Pasajero extra';
        $servicio->price = '10000';
        $servicio->save();
    }
}
