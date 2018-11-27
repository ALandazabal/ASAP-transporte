<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
	{
	    // La creación de datos de roles debe ejecutarse primero
	    $this->call(RoleTableSeeder::class);
	    // Los usuarios necesitarán los roles previamente generados
	    $this->call(UserTableSeeder::class);

	    $this->call(SliderTableSeeder::class);
	    
	    $this->call(VehicleTableSeeder::class);

	    $this->call(ComunaTableSeeder::class);

	    $this->call(ServicioTableSeeder::class);

	    $this->call(TviajeTableSeeder::class);

	    $this->call(MpagoTableSeeder::class);

	    $this->call(PreciosTableSeeder::class);
	}
}
