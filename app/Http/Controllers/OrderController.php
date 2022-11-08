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

        $orders = DB::table('orders')
        ->join('customers',"customers.id","=","orders.customerid")
        ->select("orders.id as id","orders.orderid as orderid","customers.name as customer","orders.orderdate as orderdate","orders.ordertime as ordertime","orders.netamount as netamount")
        ->get();

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

        $purchases = DB::table('issues')
        ->join('products',"products.id","=","issues.purchaseproduct")
        ->select("issues.id as id","issues.name as issue","products.name as product","issues.type as type","issues.freeproduct as freeproduct","issues.pquantity as pquantity","issues.fquantity as fquantity","issues.lowerlimit as lowerlimit","issues.upperlimit as upperlimit","products.code as code","products.price as price","products.expirydate as expirydate")
        ->get();

        return view('Order.add',compact('customers','products','purchases'));
    }

    public function view($id)
    {
        $order = Order::find($id);
        $customer = Customer::find($order->customerid);
        return view('Order.view', compact('order','customer'));
    }

    public function store(Request $request)
    {


        $netAmount = 0;

        print_r($request->rows);

        $request->validate([
            'customerid' => 'required',
            'rows' => 'required',
        ]);
         $purchases = DB::table('issues')
        ->join('products',"products.id","=","issues.purchaseproduct")
        ->select("products.price as price","issues.id as id")
        ->get();

        $amount = [];
        foreach($request->rows as $row){

           foreach($purchases as $purchase)
           {
                if($row == $purchase->id)
                {
                    $netAmount = $netAmount + $purchase->price;
                }
           }
            // $netAmount = $netAmount + $purchases->select('price')->first();
        }

        // echo($netAmount);



        DB::table('orders')->insert([
            'orderid'=> hexdec(uniqid()),
            'customerid' => $request->customerid,

            'orderdate' => Carbon::today()->format('Y-m-d'),
            'ordertime' =>Carbon::now()->format('H:i:m'),
            'netamount' => $netAmount,

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
