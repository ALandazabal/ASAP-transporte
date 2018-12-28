<?php

use Illuminate\Database\Seeder;
use App\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slider = new Slider();
        $slider->title = "PEUGEOT TRAVELLER";
        $slider->description = "Frontal";
        $slider->photo = '1.jpg';
        $slider->slider = true;
        $slider->save();

        $slider = new Slider();
        $slider->title = "PEUGEOT TRAVELLER";
        $slider->description = "Perfil";
        $slider->photo = '2.jpg';
        $slider->slider = true;
        $slider->save();

        $slider = new Slider();
        $slider->title = "PEUGEOT TRAVELLER";
        $slider->description = "Interior";
        $slider->photo = '3.jpg';
        $slider->slider = true;
        $slider->save();

        $slider = new Slider();
        $slider->title = "PEUGEOT TRAVELLER";
        $slider->description = "Maletero";
        $slider->photo = '4.jpg';
        $slider->slider = true;
        $slider->save();

        $slider = new Slider();
        $slider->title = "PEUGEOT TRAVELLER";
        $slider->description = "Vista aéreo";
        $slider->photo = '5.jpg';
        $slider->slider = true;
        $slider->save();
    }
}
