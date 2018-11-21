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
        /*$passenger = new Passenger();
        $passenger->cantidad = "parkingPay";
        $passenger->price = 4000;
        $passenger->save();
*/
        $passenger = new Passenger();
        $passenger->cantidad = "1 PAX";
        $passenger->price = 20000;
        $passenger->save();

        $passenger = new Passenger();
        $passenger->cantidad = "2 PAX";
        $passenger->price = 22000;
        $passenger->save();

        $passenger = new Passenger();
        $passenger->cantidad = "3 PAX";
        $passenger->price = 26000;
        $passenger->save();

        $passenger = new Passenger();
        $passenger->cantidad = "4 PAX";
        $passenger->price = 30000;
        $passenger->save();

        $passenger = new Passenger();
        $passenger->cantidad = "5 PAX";
        $passenger->price = 35000;
        $passenger->save();

        $passenger = new Passenger();
        $passenger->cantidad = "6 PAX";
        $passenger->price = 38000;
        $passenger->save();

        $passenger = new Passenger();
        $passenger->cantidad = "7 PAX";
        $passenger->price = 42000;
        $passenger->save();

        $passenger = new Passenger();
        $passenger->cantidad = "8 PAX";
        $passenger->price = 46000;
        $passenger->save();
    }
}
