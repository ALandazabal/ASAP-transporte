<?php

use Illuminate\Database\Seeder;
use App\Precio;
use App\Comuna;
use App\Tviaje;

class PreciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = Comuna::where('name', 'VALPARAISO')->first();
        $c2 = Comuna::where('name', 'VIÑA DEL MAR')->first();
        $c3 = Comuna::where('name', 'PORTILLO')->first();
        $c4 = Comuna::where('name', 'VALLE NEVADO')->first();
        $c5 = Comuna::where('name', 'FARE/PARVA/COLORADO')->first();
        $c6 = Comuna::where('name', 'PIRQUE CONCHA TORO/SANTA RITA')->first();
        $c7 = Comuna::where('name', 'COLCHAGUA STA CRUZ/VIU MONETT/MONTES')->first();
        $c8 = Comuna::where('name', 'CITY TOUR')->first();
        $c9 = Comuna::where('name', 'CAJON DEL MAIPO')->first();
        $c10 = Comuna::where('name', 'EMBALSE EL YESO')->first();
        $c11 = Comuna::where('name', 'COMPRAS MALL/OUTLET')->first();
        $c12 = Comuna::where('name', 'LOS ANDES')->first();
        
        $t1 = Tviaje::where('descripcion', 'Traslado')->first();
        $t2 = Tviaje::where('descripcion', 'Tour')->first();

        /*$precio = new Precio();
        $precio->comuna()->associate($c1);
        $precio->tviaje()->associate($t1);
        $precio->precio = '90000';
        $precio->descripcion = 'Solo ida';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c2);
        $precio->tviaje()->associate($t1);
        $precio->precio = '90000';
        $precio->descripcion = 'Solo ida';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c3);
        $precio->tviaje()->associate($t1);
        $precio->precio = '160000';
        $precio->descripcion = 'Solo ida (sin espera)';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c4);
        $precio->tviaje()->associate($t1);
        $precio->precio = '120000';
        $precio->descripcion = 'Solo ida (sin espera)';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c5);
        $precio->tviaje()->associate($t1);
        $precio->precio = '90000';
        $precio->descripcion = 'Solo ida (sin espera)';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c6);
        $precio->tviaje()->associate($t1);
        $precio->precio = '55000';
        $precio->descripcion = 'Solo ida (sin espera)';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c7);
        $precio->tviaje()->associate($t1);
        $precio->precio = '160000';
        $precio->descripcion = 'Solo ida (sin espera)';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c12);
        $precio->tviaje()->associate($t1);
        $precio->precio = '95000';
        $precio->descripcion = 'Solo ida';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c9);
        $precio->tviaje()->associate($t1);
        $precio->precio = '80000';
        $precio->descripcion = 'Solo ida';
        $precio->save();*/

        $precio = new Precio();
        $precio->comuna()->associate($c1);
        $precio->tviaje()->associate($t2);
        $precio->precio = '150000';
        $precio->descripcion = 'full day 8 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c2);
        $precio->tviaje()->associate($t2);
        $precio->precio = '150000';
        $precio->descripcion = 'full day 8 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c3);
        $precio->tviaje()->associate($t2);
        $precio->precio = '220000';
        $precio->descripcion = 'full day 8 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c4);
        $precio->tviaje()->associate($t2);
        $precio->precio = '150000';
        $precio->descripcion = 'full day 8 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c5);
        $precio->tviaje()->associate($t2);
        $precio->precio = '120000';
        $precio->descripcion = 'full day 8 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c6);
        $precio->tviaje()->associate($t2);
        $precio->precio = '80000';
        $precio->descripcion = 'full day 4 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c7);
        $precio->tviaje()->associate($t2);
        $precio->precio = '220000';
        $precio->descripcion = 'full day 8 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c8);
        $precio->tviaje()->associate($t2);
        $precio->precio = '80000';
        $precio->descripcion = 'full day 4 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c9);
        $precio->tviaje()->associate($t2);
        $precio->precio = '160000';
        $precio->descripcion = 'full day 8 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c10);
        $precio->tviaje()->associate($t2);
        $precio->precio = '160000';
        $precio->descripcion = 'full day 8 hrs. Incluye horas de traslado';
        $precio->save();

        $precio = new Precio();
        $precio->comuna()->associate($c11);
        $precio->tviaje()->associate($t2);
        $precio->precio = '60000';
        $precio->descripcion = 'full day 4 hrs. Incluye horas de traslado';
        $precio->save();

        
    }
}
