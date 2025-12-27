<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
// use vendor\symfony\http-foundation\File;
// use Symfony\Component\HttpFoundation\File\File;

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

    public function updateAddCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.updatecategory', compact('category'));
    }


    public function postUpdateCategory(Request $request, $id){
        $category = Category::findOrFail($id);
        $category-> category  = $request -> category;
        $category -> save();    
        return redirect()->back()-> with('category_updated_message','Category Updated Successfully');
    }


    public function addProduct(){
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }
    public function postAddProduct(Request $request)
    {
        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_qty = $request->product_qty;
        $product->product_price = $request->product_price;

        // Correct category
        $product->product_category = 'Some Value';
        $product->category_id = $request->product_category;
        // Image upload
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);
            $product->product_image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('product_message', 'Product added successfully!');
    }

    public function viewProduct(){
        $products = Product::paginate(2);
        
        return view('admin.view_product', compact('products'));
    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $product->delete();
        $image_path = public_path('product/'.$product->product_image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        return redirect()->back()->with('deleteproduct_message','Product deleted Successfully!');
    }

    public function updateProduct($id){
        $product = Product::findOrFail($id);
        $category = Category::all();
        return view('admin.updateproduct',compact('product','category'));
    }
    
}
