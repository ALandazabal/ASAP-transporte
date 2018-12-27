<?php

use Illuminate\Database\Seeder;
use App\Statetf;

class StatetfTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = new Statetf();
        $state->valor = 'Proceso';
        $state->descripcion = 'Es el estado inicial del transfer antes de confirmar el pago';
        $state->save();

        $state = new Statetf();
        $state->valor = 'Aceptada';
        $state->descripcion = 'Es el estado donde el pago del transfer ha sido aceptado';
        $state->save();

        $state = new Statetf();
        $state->valor = 'Fallido';
        $state->descripcion = 'Es el estado donde el pago del transfer no ha sido aceptado';
        $state->save();

        $state = new Statetf();
        $state->valor = 'Cancelado';
        $state->descripcion = 'Es el estado donde el transfer ha sido cancelado';
        $state->save();
    }
}
