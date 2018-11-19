<?php

use Illuminate\Database\Seeder;
use App\Vehicle;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$vehicle = new Vehicle();
    	$vehicle->description = "Minivan";
    	$vehicle->passengers = 8;
    	$vehicle->save();

    	$vehicle = new Vehicle();
    	$vehicle->description = "Taxi";
    	$vehicle->passengers = 4;
    	$vehicle->save();
    }
}
