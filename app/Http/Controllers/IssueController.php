<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
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

     // 'name',
// 'type',
// 'purchaseproduct',
// 'freeproduct',
// 'pquantity',
// 'fquantity',
// 'lowerlimit',
// 'upperlimit',

// 'name',
// 'code',
// 'price',
// 'expirydate',
    public function index()
    {
        // $issues = Issue::all();
        $i = 0;
        $issues = DB::table('issues')
                  ->select("issues.id as id","issues.name as issue","products.name as product","issues.type as type","issues.freeproduct as freeproduct","issues.pquantity as pquantity","issues.fquantity as fquantity","issues.lowerlimit as lowerlimit","issues.upperlimit as upperlimit","products.code as code","products.price as price","products.expirydate as expirydate")
                  ->join('products',"products.id","=","issues.purchaseproduct")
                  ->get();
        return view('Issue.home', compact('issues', 'i'));
    }

    public function edit($id)
    {
        $issue = Issue::where('id', $id)->first();
        $products = Product::all();
        $product = Product::find($issue->purchaseproduct);


        return view('Issue.edit', compact('issue','product','products'));
    }

    public function create()
    {
        $products = Product::all();
        return view('Issue.add',compact('products'));
    }

    public function view($id)
    {
    //     $issuepro = Issue::where('id', $id)->first();

        $purchase = DB::table('issues')
                ->join('products',"products.id","=","issues.purchaseproduct")
                ->select("issues.id as id","issues.name as issue","products.name as product","issues.type as type","issues.freeproduct as freeproduct","issues.pquantity as pquantity","issues.fquantity as fquantity","issues.lowerlimit as lowerlimit","issues.upperlimit as upperlimit","products.code as code","products.price as price","products.expirydate as expirydate")
                ->get()
                ->where('id',$id)
                ->first();

        return view('Issue.view', compact('purchase'));

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



        $customer = DB::table('issues')->insert([
            'name' => $request->name,
            'type' =>  $request->type,
            'purchaseproduct' => $request->purchaseproduct,
            'freeproduct' => $request->freeproduct,
            'pquantity' =>  $request->pquantity,
            'fquantity' =>  $request->fquantity,
            'lowerlimit' =>  $request->lowerlimit,
            'upperlimit' =>  $request->upperlimit,
        ]);


        return redirect()->route('issue.home')->with('success', 'successfully inserted');
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




        DB::table('issues')->where('id',$id)->update([
            'name' => $request->name,
            'type' =>  $request->type,
            'purchaseproduct' => $request->purchaseproduct,
            'freeproduct' => $request->freeproduct,
            'pquantity' =>  $request->pquantity,
            'fquantity' =>  $request->fquantity,
            'lowerlimit' =>  $request->lowerlimit,
            'upperlimit' =>  $request->upperlimit,
        ]);


        return redirect()->route('issue.home')->with('success', 'successfully updated');


    }


}
