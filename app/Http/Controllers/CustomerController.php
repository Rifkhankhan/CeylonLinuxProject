<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
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
        $customers = Customer::all();
        $i = 0;
        return view('Customer.home', compact('customers', 'i'));
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('Customer.edit', compact('customer'));
    }

    public function create()
    {
        return view('Customer.add');
    }

    public function view($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('Customer.view', compact('customer'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => "required|numeric|gt:0",
            'expirydate' => "required",

        ]);



        $customer = DB::table('customers')->insert([
            'name' => $request->name,
            'code' =>   hexdec(uniqid()),
            'price' => $request->price,
            'expirydate' => $request->expirydate,
        ]);


        return redirect()->route('customer.home')->with('success', 'successfully inserted');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => "required|numeric|gt:0",
            'expirydate' => "required",

        ]);




        $custome = DB::table('customer')->where('id',$id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'price' => $request->price,
            'expirydate' => $request->expirydate,
        ]);


        return redirect()->route('customer.home')->with('success', 'successfully updated');


    }



    public function delete($id)
    {

        DB::table('customers')->where('id',$id)->delete();
        return redirect()->back();
    }
}
