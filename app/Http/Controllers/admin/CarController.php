<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $cars = Car::with('category')->get();
        return view('admin.car.index',compact('cars','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cars',
            'category_id' => 'required',
            'model' => 'nullable',
            'make' => 'nullable',
            'color' => 'nullable',
            'registration_no' => 'nullable',

        ]);

        $car = new Car();
        $car->name = $request->name;
        $car->category_id = $request->category_id;
        $car->model = $request->model;
        $car->make = $request->make;
        $car->color = $request->color;
        $car->registration_no = $request->registration_no;
        $car->save();
        return redirect()->route('cars.index')->with('success','Car added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:cars,name,'.$id,
            'category_id' => 'required',
            'model' => 'nullable',
            'make' => 'nullable',
            'color' => 'nullable',
            'registration_no' => 'nullable',

        ]);

        $car = Car::find($id);
        $car->name = $request->name;
        $car->category_id = $request->category_id;
        $car->model = $request->model;
        $car->make = $request->make;
        $car->color = $request->color;
        $car->registration_no = $request->registration_no;
        $car->save();
        return redirect()->route('cars.index')->with('success','Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect()->route('cars.index')->with('fail','Car deleted successfully');
    }
}
