<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Product;
use App\Category;

class ProductsController extends Controller {

    public function addProduct(Request $request) {
        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $product = new Product;
                $categories = new Category;
            }
            $categories = Category::get();
            return view('admin.products.add_product')->with(compact('categories'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }
    public function viewProducts(){
        if (Session::has('adminSession')) {
            $products = Product::get();
            return view('admin.products.view_products')->with(compact('products'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
