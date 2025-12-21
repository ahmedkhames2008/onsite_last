<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Home;
use App\Models\Meal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $meals = Meal::with('category')->get();

    return view('welcome', compact('meals',"categories"));
    }

    public function category($id)
    {
        $meals = Meal::with('category')->where('category_id', $id)->get();
        $categories = Category::all();
        return view('welcome', compact('meals', 'categories'));
    }
}
