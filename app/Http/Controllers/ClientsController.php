<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Clients::all();
        return view('admin/clients/index',compact('clients'));
    }

    public function Clients()
    {
        $Clients = Clients::all()->makeHidden(['created_at','updated_at']);
        return response()->json(['Clients' => $Clients], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/clients/create');
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
            'name'=>'required|min:5',
            'img' => 'required|image|max:5000',
        ]);

        $image = request('img');
        $imagee = time() . '.' .$image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
//        $image_resize->resize(150, 100);
        $image_resize->save(public_path('img/clients/' .$imagee));
        $partner=new Clients();
        $partner->name=request('name');
        $partner->img=$imagee;
        $partner->save();
        return redirect('admin/clients')->with('success','تم اضافه البيانات بنجاح');
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
        $clients=Clients::find($id);
        return view('admin/clients/edit',compact('clients'));
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
        $clients=Clients::find($id);

        if (request()->hasFile('img')){
            $this->validate(request(),[
                'img' => 'required|image|max:5000',
            ]);
            $image = request('img');
            $imagee = time() . '.' .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
//            $image_resize->resize(150, 100);
            $image_resize->save(public_path('img/clients/' .$imagee));
            $clients->img=$imagee;
            $clients->save();
            return redirect('admin/clients')->with('success','تم تعديل البيانات بنجاح');
        }
        else{

            $this->validate(request(),[
                'name'=>'required|min:5',
            ]);
            $clients->name=request('name');
            $clients->save();
            return redirect('admin/clients')->with('success','تم تعديل البيانات بنجاح');
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
        $clients=Clients::find($id);
        \File::delete(public_path('img/clients/'.$clients->img));

        $clients->delete();
        return redirect('/admin/clients')->with('success','تم حذف البيانات بنجاح');
    }
}
