<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;
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

    // public function edit($id)
    // {
    //     $order = Order::where('id', $id)->first();
    //     $customer = Customer::find($id);

    //     $products = Product::all();
    //     $product = Product::find($issue->purchaseproduct);


    //     return view('Order.edit', compact('order','product','products','customer'));
    // }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        // $mergeProductWithIssue =

        return view('Order.add',compact('customers','products'));
    }

    public function view($id)
    {
        $order = Order::where('id', $id)->first();
        $customer = Customer::find($order->customerid);
        return view('Order.view', compact('order','customer'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'customerid' => 'required',
            'productid' => "required",
            'quantity' => "required",
        ]);

        $productPrice = Product::find($request->productid)->price;

        $total = $productPrice * $request->quantity;


        DB::table('orders')->insert([
            'orderid'=> hexdec(uniqid()),
            'customerid' => $request->customerid,

            'orderdate' => Carbon::today()->format('Y-m-d'),
            'ordertime' =>Carbon::now()->format('H:i:m'),
            'netamount' => $total,

        ]);


        return redirect()->route('order.home')->with('success', 'successfully inserted');
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'type' => "required",
    //         'purchaseproduct' => "required",
    //         'freeproduct' => 'required',
    //         'pquantity' => "required",
    //         'fquantity' => "required",
    //         'lowerlimit' => "required|numeric|gt:-1",
    //         'upperlimit' => "required|numeric|gt:0",

    //     ]);




    //     DB::table('orders')->where('id',$id)->update([
    //         'name' => $request->name,
    //         'type' =>  $request->type,
    //         'purchaseproduct' => $request->purchaseproduct,
    //         'freeproduct' => $request->freeproduct,
    //         'pquantity' =>  $request->pquantity,
    //         'fquantity' =>  $request->fquantity,
    //         'lowerlimit' =>  $request->lowerlimit,
    //         'upperlimit' =>  $request->upperlimit,
    //     ]);


    //     return redirect()->route('order.home')->with('success', 'successfully updated');


    // }

}
