<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sliders=Slider::all();
       return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $image = request('img');
        $imagee = time() . 'slider.' . $image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(800, 200);
        $image_resize->save(public_path('images/sliders/' . $imagee));

        $slider = new Slider();
        $slider->img = $imagee;
        $slider->title_ar=request('title_ar');
        $slider->title_en=request('title_en');
        $slider->title_ur=request('title_ur');
        $slider->body_ar=request('body_ar');
        $slider->body_en=request('body_en');
        $slider->body_ur=request('body_ur');




        $slider->save();

        return redirect()->back()->with('success', trans('lang.saveb'));


    }


    public function show(Slider $slider)
    {
        //
    }


    public function edit(Slider $slider)
    {


    }


    public function update(Request $request, Slider $slider)
    {

            $slider = Slider::findOrFail($slider->id);

            if (request('image1')){
                \File::delete(public_path('images/sliders/'.$slider->image));
                $image = request('image1');
                $imagee = time() . 'slider.' .$image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(800, 200);
                $image_resize->save(public_path('images/sliders/' .$imagee));
                $slider->img = $imagee;

        }

            $slider->title_ar=request('title_ar');
            $slider->title_en=request('title_en');
            $slider->title_ur=request('title_ur');
            $slider->body_ar=request('body_ar');
            $slider->body_en=request('body_en');
            $slider->body_ur=request('body_ur');

            $slider->save();
            return redirect('/admin/slider')->with('success', trans('lang.upb'));


    }

    public function destroy(Slider $slider)
    {
        $slider = Slider::findOrFail($slider->id);
        \File::delete(public_path('/images/sliders/'.$slider->image));
        $slider->delete();
        return redirect()->back()->with('success', trans('lang.delb'));
    }
}
