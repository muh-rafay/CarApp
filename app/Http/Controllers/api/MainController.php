<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    public function getCategory()
    {
        $categories = Category::all();
        return $this->sendResponse($categories, 'Successfully get categories');
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:categories',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return $this->sendResponse($category, 'Successfully add category');
    }

    public function editCategory(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:categories,id',
            'name' => 'required|string|max:255|unique:categories',
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return $this->sendResponse($category, 'Successfully edit category');
    }

    public function getCars()
    {
        $cars = Car::with('category')->get();
        return $this->sendResponse($cars, 'Successfully get cars');
    }

    public function addCar(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:cars',
            'category_id' => 'required|integer|exists:categories,id',
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
        return $this->sendResponse($car, 'Successfully add car');
    }

    public function editCar(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|exists:cars,id',
            'name' => 'required|string|max:255|unique:cars,name,'.$request->id,
            'category_id' => 'required|integer|exists:categories,id',
            'model' => 'nullable',
            'make' => 'nullable',
            'color' => 'nullable',
            'registration_no' => 'nullable',
        ]);
        $car = Car::find($request->id);
        $car->name = $request->name;
        $car->category_id = $request->category_id;
        $car->model = $request->model;
        $car->make = $request->make;
        $car->color = $request->color;
        $car->registration_no = $request->registration_no;
        $car->save();
        return $this->sendResponse($car, 'Successfully edit car');
    }
}

