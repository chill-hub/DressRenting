<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('admin.products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // this is showing to the admin dashboad

        $products = Product::all();
        
        $products= Product::paginate(1);
        return view('admin.categories.create', ['products'=>'$products','product'=>$product]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }




}
