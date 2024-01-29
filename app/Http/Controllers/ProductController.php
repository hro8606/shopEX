<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.add-product',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product = new Product();

        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->category = $request['category'];
        $product->quantity = $request['quantity'];
        $product->price = $request['price'];
        $product->discount_price = $request['dis_price'];

        // add other fields
        $product->save();

        if ($request->file('image')){
            $this->storeAttachment($request,$product);
        }


        $category = Category::all();
//        return view('admin.product.add-product',compact('category'));
        return redirect()->back()->with('message','Product added Successfully')->with(compact('category'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product):View
    {

        $category = Category::all();
        return view('admin.product.edit', [
            'product' => $product,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->except('image'));

        if ($request->file('image')){
            Storage::disk('public')->delete("product/".$product->image);

            $this->storeAttachment($request,$product);
        }

        return redirect(route('view_product'));
    }

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy(Request $request,Product $product)
    public function destroy(Product $product)
    {
        $image_name = $product->image;

//        need to delete image also it exist
        if(Storage::exists('public/product/'.$image_name)){
            Storage::delete('public/product/'.$image_name);
            /*
                Delete Multiple files this way
                Storage::delete(['upload/test.png', 'upload/test2.png']);
            */
        }

        $product->delete();
        return redirect(route('view_product'));
    }

    protected function storeAttachment($request, $product){

        foreach ($request->file('image') as $image){
            $ext = $image->extension();
            $contents = file_get_contents($image);
            $filename = Str::random(25);
            $path = "$filename.$ext";
            Storage::disk('public')->put("product/".$path,$contents);

            $product->update(['image'=>$path]);
        }





    }

}
