<?php

namespace App\Http\Controllers;

use App\category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= category::paginate(5);

        return view('user.user_product', compact('categories'));

        //return view('home');
    }


    public function store(Request $request)
    {

        //  dd($request->all());

        $request->validate([

            'title'=>'required',
            'slug'=> 'required',
            'description'=>'required',
            'status'=> 'required',
            'thumbnail'=>'required|mimes:jpeg,bmp,png|max:2048',
            'price'=>'required',



        ]);

        if ($request->hasFile('thumbnail')) {
            $title = $request->title;
            $description = $request->description;
            $price = $request->price;
            $discount = $request->discount;

            // Get just ext
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $title . '_' . time() . '.' . $extension;
            $request->file('thumbnail')
                ->storeAs('public/upload', $fileNameToStore);
            $product = new Product;
            //dd($request->all());
            $product->title = $title;
            $product->description = $description;
            $product->price = $price;
            $product->discount = $discount;
            $product->discount_price = ($price * (100 - $discount)) / 100;
            $product->thumbnail = "storage/upload/$fileNameToStore";
            $product->options = "2";
            $product->slug = "5";
            $product->save();
            return Redirect::back();


        }
    }
    public function profile()
    {

    }
}
