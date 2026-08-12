<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    // ফুড লিস্ট দেখানোর জন্য
    public function index()
    {
        // with('category') দিয়ে আমরা ফুডের সাথে তার ক্যাটাগরির নামও নিয়ে আসছি
        $foods = Food::with('category')->latest()->get();
        return view('admin.food.index', compact('foods'));
    }

    // ফুড তৈরি করার ফর্ম দেখানোর জন্য
    public function create()
    {
        // ফর্মে ড্রপডাউনে দেখানোর জন্য শুধুমাত্র Active ক্যাটাগরিগুলো আনছি
        $categories = Category::where('status', 1)->get();
        return view('admin.food.create', compact('categories'));
    }

    // ফুড ডেটাবেসে সেভ করার জন্য
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // ছবির ভ্যালিডেশন
        ]);

        // ছবি আপলোড করার লজিক
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/food'), $imageName);
        }

        Food::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('food.index')->with('success', 'Food Item Created Successfully!');
    }

    // ফুড এডিট ফর্ম দেখানোর জন্য
    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        return view('admin.food.edit', compact('food', 'categories'));
    }

    // এডিট করা ফুড আপডেট করার জন্য
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $food = Food::findOrFail($id);
        $imageName = $food->image;

        // যদি নতুন ছবি দেয়, তবে আগের ছবি মুছে নতুনটি আপলোড হবে
        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/food/' . $food->image))) {
                File::delete(public_path('uploads/food/' . $food->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/food'), $imageName);
        }

        $food->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        return redirect()->route('food.index')->with('success', 'Food Item Updated Successfully!');
    }

    // ফুড ডিলিট করার জন্য
    public function destroy($id)
    {
        $food = Food::findOrFail($id);

        // ডেটাবেস থেকে ডিলিট করার আগে ফোল্ডার থেকে ছবি মুছে ফেলা
        if (File::exists(public_path('uploads/food/' . $food->image))) {
            File::delete(public_path('uploads/food/' . $food->image));
        }
        
        $food->delete();

        return redirect()->route('food.index')->with('success', 'Food Item Deleted Successfully!');
    }
}