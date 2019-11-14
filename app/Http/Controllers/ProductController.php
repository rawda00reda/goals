<?php

namespace App\Http\Controllers;

use App\Model\Gallery;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all();

        return view('admin.product.show',compact('product','products'));
    }







    public function store(Request $request)
    {


        $image = request('img');
        $imagee = time() . 'product.' . $image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(800, 200);
        $image_resize->save(public_path('images/products/' . $imagee));

        $product = new Product();
        $product->img = $imagee;
        $product->name_ar=request('name_ar');
        $product->name_en=request('name_en');
        $product->name_ur=request('name_ur');
        $product->info_ar=request('info_ar');
        $product->info_en=request('info_en');
        $product->info_ur=request('info_ur');
        $product->price=request('price');
        $product->condition_ar=request('condition_ar');
        $product->condition_en=request('condition_en');
        $product->condition_ur=request('condition_ur');
        $product->SoldBy=request('SoldBy');


        $product->save();

        return redirect()->back()->with('success', trans('lang.saveb'));


    }

    public function update(Request $request, Product $product)
    {

        $product = Product::findOrFail($product->id);

        if (request('image1')){
            \File::delete(public_path('images/products/'.$product->image));
            $image = request('image1');
            $imagee = time()  .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(800, 200);
            $image_resize->save(public_path('images/products/' .$imagee));
            $product->img = $imagee;

        }

        $product->name_ar=request('name_ar');
        $product->name_en=request('name_en');
        $product->name_ur=request('name_ur');
        $product->info_ar=request('info_ar');
        $product->info_en=request('info_en');
        $product->info_ur=request('info_ur');
        $product->price=request('price');
        $product->condition_ar=request('condition_ar');
        $product->condition_en=request('condition_en');
        $product->condition_ur=request('condition_ur');
        $product->SoldBy=request('SoldBy');

        $product->save();
        return redirect('/admin/product')->with('success', trans('lang.upb'));


    }

    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        \File::delete(public_path('/images/products/'.$product->image));
        $product->delete();
        return redirect()->back()->with('success', trans('lang.delb'));
    }


}
