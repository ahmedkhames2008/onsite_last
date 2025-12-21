<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"string|required|max:255"
        ]);

        Category::create([
            "name"=>$request->name,
            "slug"=>str::slug($request->name)
    ]);
        session()->flash("success","Category Created Successfully");
        return redirect("/categories");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("categories.edit",compact("category")) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name"=>"required|string|max:255"
        ]);
        $category->update([
            "name"=>$request->name,
            "slug"=>Str::slug($request->name),
        ]);
        session()->flash("success","Category Updated Successfully");
        return redirect("/categories");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
    session()->flash('success', 'Category deleted successfully.');
    return redirect('/categories');
    }
}
