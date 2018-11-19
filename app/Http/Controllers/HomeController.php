<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request){
        $slider = Slider::where('slider', true)->get();
        
        return view('index')->with('slider', $slider);
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }
}
