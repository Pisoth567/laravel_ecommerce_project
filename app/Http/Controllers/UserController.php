<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
        public function index(){
             if(Auth::check()){
                $count = ProductCard::where('user_id',Auth::id())->count();
            }else{
                $count = '';
            }

            if(Auth::check() && Auth::user()->user_type == "user"){
                return view('index');
            }
            else if( Auth::user()->user_type == "admin"){
                return view('admin.dashboard');
            }
        }

        public function home(){
            if(Auth::check()){
                $count = ProductCard::where('user_id',Auth::id())->count();
            }else{
                $count = '';
            }
            $products = Product::latest()->take(4)->get();
            return view('index',compact('products','count'));
        }

        public function productDetail($id){
             if(Auth::check()){
                $count = ProductCard::where('user_id',Auth::id())->count();
            }else{
                $count = '';
            }

            $product = Product::findOrFail($id);
            return view('product_detail',compact('product'));
        }

        public function allProducts(){
             if(Auth::check()){
                $count = ProductCard::where('user_id',Auth::id())->count();
            }else{
                $count = '';
            }

            $products = Product::all();
            return view('allproduct',compact('products'));
        }
        public function addToCard($id){
            $product = Product::findOrFail($id);
            $product_card = new ProductCard();
            $product_card-> user_id = Auth::id();
            $product_card-> product_id = $product -> id;
            $product_card->save();
            return redirect()->back()->with('card_message', 'Added to the Cart');
        }

        public function cartProducts(){
            if(Auth::check()){
                $count = ProductCard::where('user_id',Auth::id())->count();
                $cart = ProductCard::where('user_id', Auth::id())->get();
            }else{
                $count = '';
            }

            return view('viewcartproducts', compact('count','cart'));
        }

        public function removeCartProduct($id){
            $cartproduct = ProductCard::findOrFail($id);
            $cartproduct->delete();
            return redirect()->back();
        }

        public function comfirmOrder(Request $request){
            $car_product_id = ProductCard::where('user_id',Auth::id())->get();  
            $address = $request-> receiver_address;
            $phone = $request-> receiver_phone;
            foreach( $car_product_id as $cart_product){
                $order = new Order();
                $order -> receiver_address = $address;
                $order -> receiver_phone = $phone;
                $order -> user_id = Auth::id();
                $order -> product_id = $cart_product->product_id;
                $order -> save();
            }

            $carts = ProductCard::where('user_id',Auth::id())->get();
            foreach($carts as $cart){
                $cart_id = ProductCard::find($cart-> id);
                $cart_id -> delete();
            }

            return redirect()->back()->with('comfirm_order', "Order Comfirmed");
        }
}

