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
        $comuna->name = "Santiago";
        $comuna->description = "Santiago, Chile";
        $comuna->price = 100;
        $comuna->save();

        $comuna = new Comuna();
        $comuna->name = "Chiloé";
        $comuna->description = "Chiloé, Chile";
        $comuna->price = 300;
        $comuna->save();
    }
}
