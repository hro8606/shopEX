<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    opening the categories page , inside this page we can add the categories to db
    public function index()
    {
        return view('admin.home');
    }

    public function view_category()
    {
        $categories = Category::all();

        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function store_category(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $post = new Category();
        $post->name = $request->category;
        $post->save();
        return redirect('view_category')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
     public function delete_category(string $id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect('view_category')->with('status', 'Category Deleted Successfully ');
    }

}
