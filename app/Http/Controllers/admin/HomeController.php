<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $category_count = Category::count();
        $car_count = Car::count();
        return view('admin.index',compact('category_count','car_count'));
    }
}
