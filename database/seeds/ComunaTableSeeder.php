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
        /*$comuna = new Comuna();
        $comuna->name = "Santiago";
        $comuna->description = "Santiago, Chile";
        $comuna->price = 100;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "Chiloé";
        $comuna->description = "Chiloé, Chile";
        $comuna->price = 300;
        $comuna->save();*/

        $comuna = new Comuna();
        $comuna->name = "AERO A VALPARAISO";
        $comuna->description = "SOLO IDA";
        $comuna->price = 100000;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "AERO A VIÑA DEL MAR";
        $comuna->description = "SOLO IDA";
        $comuna->price = 110000;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "AERO A FARELLONES";
        $comuna->description = "IDA Y VUELTA";
        $comuna->price = 170000;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "AERO A PIRQUE";
        $comuna->description = "SOLO IDA";
        $comuna->price = 60000;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "AERO A LOS ANDES";
        $comuna->description = "SOLO IDA";
        $comuna->price = 85000;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "AERO A CAJON DEL MAIPO";
        $comuna->description = "SOLO IDA";
        $comuna->price = 50000;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "AERO A EL EMBALSE DEL YESO";
        $comuna->description = "IDA Y VUELTA";
        $comuna->price = 200000;
        $comuna->save();
    }
}
