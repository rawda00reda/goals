<?php

namespace App\Http\Controllers;

use App\Certifications;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class CertificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifications=Certifications::all();
        return view('admin/certifications/index',compact('certifications'));
    }

    public function Certifications()
    {
        $Certifications = Certifications::all()->makeHidden(['created_at','updated_at']);
        return response()->json(['Certifications' => $Certifications], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/certifications/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'img' => 'required|image|max:5000',
        ]);

        $image = request('img');
        $imagee = time() . '.' .$image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
//        $image_resize->resize(150, 100);
        $image_resize->save(public_path('img/cert/' .$imagee));
        $certifications=new Certifications();
        $certifications->img=$imagee;
        $certifications->save();
        return redirect('admin/certification')->with('success','تم اضافه البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certifications=Certifications::find($id);
        return view('admin/certifications/edit',compact('certifications'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $certifications=Certifications::find($id);
        if (request()->hasFile('img')){
            $this->validate(request(),[
                'img' => 'required|image|max:5000',
            ]);
            $image = request('img');
            $imagee = time() . '.' .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
//            $image_resize->resize(150, 100);
            $image_resize->save(public_path('img/cert/' .$imagee));
            $certifications->img=$imagee;
            $certifications->save();
            return redirect('admin/certification')->with('success','تم تعديل البيانات بنجاح');
        }
        else{


            $certifications->save();
            return redirect('admin/certification')->with('success','تم تعديل البيانات بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certifications=Certifications::find($id);
        \File::delete(public_path('img/cert/'.$certifications->img));
        $certifications->delete();
        return redirect('/admin/certification')->with('success','تم حذف البيانات بنجاح');
    }
}
