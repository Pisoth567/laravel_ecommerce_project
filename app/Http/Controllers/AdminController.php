<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function test_admin(){
        return view('admin.test_admin');
    }

    public function addCategory(){
        return view('admin.addcategory');
    }

public function postAddCategory(Request $request){
    $category = new Category();

    $category-> category = $request -> category;
    $category-> save();
    return redirect()->back()->with('category_message','Category Added Successfully!');
}

public function viewCategory(){
    $categories = Category::all();
    return view('admin.viewcategory', compact('categories'));
    }

public function deleteCategory($id){
    $category=Category::findOrFail($id);

    $category-> delete();
    return redirect()->back()->with('deletecategory_message','You have Deleted Successfully!');
}


}
