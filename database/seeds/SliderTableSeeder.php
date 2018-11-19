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
        $slider->title = "Ford EcoSport";
        $slider->description = "3";
        $slider->photo = 'ford-ecosport.jpg';
        $slider->slider = true;
        $slider->save();

        $slider = new Slider();
        $slider->title = "Hyundai H1";
        $slider->description = "11";
        $slider->photo = 'hyundai-h1.jpg';
        $slider->slider = true;
        $slider->save();

        $slider = new Slider();
        $slider->title = "Mercedes Sprinter";
        $slider->description = "3";
        $slider->photo = 'mercedes-sprinter.jpg';
        $slider->slider = true;
        $slider->save();

        $slider = new Slider();
        $slider->title = "Toyota Prado";
        $slider->description = "7";
        $slider->photo = 'toyota-prado.jpg';
        $slider->slider = true;
        $slider->save();
    }
}
