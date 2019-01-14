<?php

use Illuminate\Database\Seeder;
use App\Passenger;

class PassengerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $passenger = new Passenger();
        $passenger->descripcion = '1 pax';
        $passenger->precio = '20000';
        $passenger->save();

        $passenger = new Passenger();
        $passenger->descripcion = '2 pax';
        $passenger->precio = '22000';
        $passenger->save();

        $passenger = new Passenger();
        $passenger->descripcion = '3 pax';
        $passenger->precio = '26000';
        $passenger->save();

        $passenger = new Passenger();
        $passenger->descripcion = '4 pax';
        $passenger->precio = '30000';
        $passenger->save();

        $passenger = new Passenger();
        $passenger->descripcion = '5 pax';
        $passenger->precio = '35000';
        $passenger->save();

        $passenger = new Passenger();
        $passenger->descripcion = '6 pax';
        $passenger->precio = '38000';
        $passenger->save();

        $passenger = new Passenger();
        $passenger->descripcion = '7 pax';
        $passenger->precio = '42000';
        $passenger->save();

        $passenger = new Passenger();
        $passenger->descripcion = '8 pax';
        $passenger->precio = '46000';
        $passenger->save();
    }
}
