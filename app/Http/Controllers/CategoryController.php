<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // ক্যাটাগরি লিস্ট দেখার জন্য
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    // ক্যাটাগরি তৈরির ফর্ম দেখানোর জন্য
    public function create()
    {
        return view('admin.category.create');
    }

    // ক্যাটাগরি ডেটাবেসে সেভ করার জন্য
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('category.index')->with('success', 'Category Created Successfully!');
    } // <-- এই ব্র্যাকেটটি মিসিং ছিল!

    // ক্যাটাগরি এডিট ফর্ম দেখানোর জন্য
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    // এডিট করা ডেটা সেভ (আপডেট) করার জন্য
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
        ]);

        return redirect()->route('category.index')->with('success', 'Category Updated Successfully!');
    }

    // ক্যাটাগরি ডিলিট করার জন্য
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category Deleted Successfully!');
    }
}