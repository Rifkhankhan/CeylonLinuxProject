<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $i = 0;
        return view('Product.home', compact('products', 'i'));
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('Product.edit', compact('product'));
    }

    public function create()
    {
        return view('Product.add');
    }

    public function view($id)
    {
        $product = Product::where('id', $id)->first();
        return view('Product.view', compact('product'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => "required|numeric|gt:0",
            'expirydate' => "required",

        ]);



        $Product = DB::table('products')->insert([
            'name' => $request->name,
            'code' =>   hexdec(uniqid()),
            'price' => $request->price,
            'expirydate' => $request->expirydate,
        ]);


        return redirect()->route('product.home')->with('success', 'successfully inserted');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => "required|numeric|gt:0",
            'expirydate' => "required",

        ]);




        $Product = DB::table('products')->where('id',$id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'price' => $request->price,
            'expirydate' => $request->expirydate,
        ]);


        return redirect()->route('product.home')->with('success', 'successfully updated');


    }



    public function delete($id)
    {

        DB::table('products')->where('id',$id)->delete();
        return redirect()->back();
    }
}
