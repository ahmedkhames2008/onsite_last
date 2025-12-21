<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals= Meal::with('category')->get();

        return view("meals.index",compact("meals"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("meals.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('meals', 'public');
        }
    
        Meal::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'category_id' => $request->category_id,
            'image'       => $imagePath,
        ]);
        session()->flash("success","Meal Added Successfully");
        return redirect("/meals");
    }
    

      public function show(Meal $meal)
      {
          return view('meals.show', compact('meal'));
      }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
        $categories = Category::all();
        return view('meals.edit', compact('meal', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);
            if ($request->hasFile('image')) {
            Storage::disk('public')->delete($meal->image);
            $image = $request->file('image')->store('meals', 'public');
            $meal->image = $image;
            }
            $meal->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            ]);
            session()->flash('success', 'Meal Updated Successfully.');
            return redirect()->route('meals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        if ($meal->image && Storage::disk('public')->exists($meal->image)) {
            Storage::disk('public')->delete($meal->image);
        }

        $meal->delete();
        session()->flash("success","Meal Deleted Successfully");
        return redirect("/meals");
        
    }
}
