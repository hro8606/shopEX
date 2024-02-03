<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery_rows = Gallery::all();
        return view('admin.gallery.index', compact('gallery_rows'));
    }

    public function indexGalleryFront(){

        $images = Gallery::select('image', 'title','product_id')->get();
        return view('home.gallery')->with(compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.gallery.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gallery = new Gallery();

        $gallery->title = $request['title'];
        $gallery->author = $request['topic'];
        $gallery->description = $request['description'];
        $gallery->topic = $request['category'];
        $gallery->add_in_slider = $request['add_in_slider'];

        // add other fields
        $gallery->save();

        if ($request->file('image')){
            $this->storeAttachment($request,$gallery);
        }


        $category = Category::all();
        return redirect()->back()->with('message','Gallery image added Successfully')->with(compact('category'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }

    private function storeAttachment(Request $request, Gallery $gallery)
    {
            $ext = $request->file('image')->extension();
            $contents = file_get_contents($request->file('image'));
            $filename = Str::random(25);
            $path = "$filename.$ext";
            Storage::disk('public')->put("gallery/".$path,$contents);

            $gallery->update(['image'=>$path]);
    }
}
