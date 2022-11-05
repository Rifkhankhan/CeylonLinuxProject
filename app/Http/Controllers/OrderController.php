<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
        $orders = Order::all();

        $i = 0;
        return view('Order.home', compact('orders', 'i'));
    }

    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        $products = Product::all();
        $product = Product::find($issue->purchaseproduct);


        return view('Issue.edit', compact('order','product','products'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        $mergeProductWithIssue = 

        return view('Order.add',compact('customers'));
    }

    public function view($id)
    {
        $issue = Order::where('id', $id)->first();
        return view('Order.view', compact('order'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => "required",
            'purchaseproduct' => "required",
            'freeproduct' => 'required',
            'pquantity' => "required",
            'fquantity' => "required",
            'lowerlimit' => "required|numeric|gt:-1",
            'upperlimit' => "required|numeric|gt:0",


        ]);



        $customer = DB::table('orders')->insert([
            'name' => $request->name,
            'type' =>  $request->type,
            'purchaseproduct' => $request->purchaseproduct,
            'freeproduct' => $request->freeproduct,
            'pquantity' =>  $request->pquantity,
            'fquantity' =>  $request->fquantity,
            'lowerlimit' =>  $request->lowerlimit,
            'upperlimit' =>  $request->upperlimit,
        ]);


        return redirect()->route('order.home')->with('success', 'successfully inserted');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => "required",
            'purchaseproduct' => "required",
            'freeproduct' => 'required',
            'pquantity' => "required",
            'fquantity' => "required",
            'lowerlimit' => "required|numeric|gt:-1",
            'upperlimit' => "required|numeric|gt:0",

        ]);




        DB::table('orders')->where('id',$id)->update([
            'name' => $request->name,
            'type' =>  $request->type,
            'purchaseproduct' => $request->purchaseproduct,
            'freeproduct' => $request->freeproduct,
            'pquantity' =>  $request->pquantity,
            'fquantity' =>  $request->fquantity,
            'lowerlimit' =>  $request->lowerlimit,
            'upperlimit' =>  $request->upperlimit,
        ]);


        return redirect()->route('order.home')->with('success', 'successfully updated');


    }

}
