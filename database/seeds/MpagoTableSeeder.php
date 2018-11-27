<?php

use Illuminate\Database\Seeder;
use App\Mpago;

class MpagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mpago = new Mpago();
        $mpago->description = 'PayPal';
        $mpago->save();
        
        $mpago = new Mpago();
        $mpago->description = 'WebPay+';
        $mpago->save();
    }
}
