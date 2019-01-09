<?php

namespace App\Http\Controllers;

use App\Slider as Slide;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $slides = Slide::all();

        return view('slider.index')->with('slides', $slides);
    }

    public function create()
    {
        return view('slider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[ 'title'=>'required', 'description'=>'required']);

        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/img/carimages/', $name);
        }

        $slider = new Slide();
        $slider->title = $request->get('title');
        $slider->description = $request->get('description');
        //if( isset($name) )
            $slider->photo = $name ;
        $slider->slider = 1;
        $slider->save();

        return redirect()->route('sliderconfig.index')->with('success', 'Ha sido añadido el slide.');
    }

    public function show(Slider $slider)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slide::find($id);
        return view('slider.edit')->with('slider', $slider);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'title'=>'required', 'description'=>'required']);

        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/img/carimages/', $name);
        }else
            $name = $request->get('photo-name');

        $temp = Slide::find($id);
        $temp->title = $request->get('title');
        $temp->description = $request->get('description');
        $temp->photo = $name ;
        $temp->save();

        return redirect()->route('sliderconfig.index')->with('success', 'Ha sido actualizado el slide.');
    }

    public function destroy($id)
    {
        Slide::find($id)->delete();
        return redirect()->route('sliderconfig.index')->with('success','Slide eliminado correctamente.');
    }
}
