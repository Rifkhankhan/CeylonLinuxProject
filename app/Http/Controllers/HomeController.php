<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        $students = Student::all();
        $i = 0;
        return view('home', compact('students', 'i'));
    }

    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        return view('edit', compact('student'));
    }

    public function create()
    {
        return view('add');
    }

    public function view($id)
    {
        $student = Student::where('id', $id)->first();
        return view('view', compact('student'));

        return view('view', compact('student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|gt:0',
            'image' => "required|mimes:jpg,jpeg,png"

        ]);

        $brand_image = $request->file('image');
        $name_gen = hexdec(uniqid());
        $image_extendtion = strtolower($brand_image->getClientOriginalExtension());
        $image_name = $name_gen . '.' . $image_extendtion;
        $up_location = 'image/';
        $last_img = $up_location . $image_name;
        $brand_image->move($up_location, $image_name);

        $Product = DB::table('students')->insert([
            'name' => $request->name,
            'status' => $request->status,
            'age' => $request->age,
            'image' => $last_img,
        ]);


        return redirect()->route('home')->with('success', 'successfully inserted');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|gt:0',
            'status' => 'required'
        ]);

        $oldimage = $request->oldimage;
        $brand_image = $request->file('image');
        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $image_extendtion = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $name_gen . '.' . $image_extendtion;
            $up_location = 'image/';
            $last_img = $up_location . $image_name;
            $brand_image->move($up_location, $image_name);

            unlink($oldimage);
            DB::table('students')->where('id', $id)->update([
                'name' => $request->name,
                "image" => $last_img,
                "age" => $request->age,
                "status" => $request->status,
            ]);

            return redirect()->route('home')->with('success', 'successfully updated');
        } else {
            DB::table('students')->where('id', $id)->update([
                'name' => $request->name,
                "age" => $request->age,
                "status" => $request->status,
            ]);

            return redirect()->route('home')->with('success', 'successfully updated');
        }
    }

    public function changeStatus($id)
    {

        $student = Student::find($id);


        if ($status == 'active') {


            return redirect()->back()->with('success',"Successfully Changed as Inactivate");
        } else if ($status == 'inactive') {


            return redirect()->back()->with('success',"Successfully Changed as Active");

        } else {
            return redirect()->route('home')->with('success', 'Failed updated status ');
        }
    }

    public function delete($id)
    {

        Student::delete($id);
        return redirect()->back();
    }
}
