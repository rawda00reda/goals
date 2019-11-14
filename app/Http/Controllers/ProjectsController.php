<?php

namespace App\Http\Controllers;

use App\Projects;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Projects::all();
        return view('admin/projects/index',compact('projects'));
    }

    public function Projects()
    {
        $Projects = Projects::all()->makeHidden(['created_at','updated_at']);
        return response()->json(['Projects' => $Projects], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/projects/create');
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
            'title'=>'required',
            'content'=>'required',
            'img' => 'required|image|max:5000',
        ]);

        $image = request('img');
        $imagee = time() . '.' .$image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
//        $image_resize->resize(150, 100);
        $image_resize->save(public_path('img/projects/' .$imagee));
        $Projects=new Projects();
        $Projects->title=request('title');
        $Projects->content=request('content');
        $Projects->img=$imagee;
        $Projects->save();
        return redirect('admin/projects')->with('success','تم اضافه البيانات بنجاح');
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
        $projects=Projects::find($id);
        return view('admin/projects/edit',compact('projects'));


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
        $projects=Projects::find($id);

        if (request()->hasFile('img')){
            $this->validate(request(),[
                'img' => 'required|image|max:5000',
            ]);
            $image = request('img');
            $imagee = time() . '.' .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
//            $image_resize->resize(150, 100);
            $image_resize->save(public_path('img/projects/' .$imagee));
            $projects->img=$imagee;
            $projects->save();
            return redirect('admin/projects')->with('success','تم تعديل البيانات بنجاح');
        }
        else{

            $this->validate(request(),[
                'title'=>'required',
                'content'=>'required',
            ]);
            $projects->title=request('title');
            $projects->content=request('content');
            $projects->save();
            return redirect('admin/projects')->with('success','تم تعديل البيانات بنجاح');
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
        $projects=Projects::find($id);
        \File::delete(public_path('img/projects/'.$projects->img));

        $projects->delete();
        return redirect('/admin/projects')->with('success','تم حذف البيانات بنجاح');
    }
}
