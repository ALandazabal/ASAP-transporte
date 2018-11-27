<?php

use Illuminate\Database\Seeder;
use App\Tviaje;

class TviajeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viaje = new Tviaje();
        $viaje->descripcion = 'Traslado';
        $viaje->save();

        $viaje = new Tviaje();
        $viaje->descripcion = 'Tour';
        $viaje->save();
    }
}
