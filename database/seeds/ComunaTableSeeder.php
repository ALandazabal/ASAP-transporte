<?php

use Illuminate\Database\Seeder;
use App\Comuna;

class ComunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $comuna = new Comuna();
        $comuna->name = "VALPARAISO";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "VIÑA DEL MAR";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "PORTILLO";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "VALLE NEVADO";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "FARE/PARVA/COLORADO";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "PIRQUE CONCHA TORO/SANTA RITA";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "COLCHAGUA STA CRUZ/VIU MONETT/MONTES";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "CITY TOUR";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "CAJON DEL MAIPO";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "EMBALSE EL YESO";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "COMPRAS MALL/OUTLET";
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "LOS ANDES";
        $comuna->save();
    }
}
