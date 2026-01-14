<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create_category');
    }

    public function store(Request $request)
    {
        $category=new Category();
        $request->validate([
            'category' => 'required|unique:categories,name',
        ]);
        $category->name=$request->category;
        $category->save();
        return redirect(route('category.index'))->with('success','Category created successfully');
    }

    public function edit($id){
        $category=Category::findOrFail($id);
        return view('admin.category.edit_category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category=Category::findOrFail($id);
        $request->validate([
            'category' => 'required',
        ]);
        $category->name=$request->category;
        $category->update();
        return redirect(route('category.index'))->with('update_message','Category updated successfully');
    }

    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect(route('category.index'))->with('delete_message','Category deleted successfully');


    }
}
