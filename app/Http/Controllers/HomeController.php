<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(10);

        return view('home.userpage')->with(compact('product'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        dd($usertype);

        if ($usertype == '1'){
            return view('admin.home');
        }else{
            return view('dashboard');

        }
    }

    public function showProduct(Product $product):View
    {
        return view('home.product_details',compact('product'));
    }

}
