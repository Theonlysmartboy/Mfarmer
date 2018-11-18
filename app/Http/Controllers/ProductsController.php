<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;
use App\Category;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller {

    public function addProduct(Request $request) {
        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $product = new Product;
                $product->category_id = $data['category_id'];
                $product->product_name = $data['product_name'];
                $product->product_code = $data['product_code'];
                $product->product_color = $data['product_color'];
                if (!empty($data['product_desc'])) {
                    $product->description = $data['product_desc'];
                } else {
                    $product->description = '_';
                }
                $product->price = $data['product_cost'];
                //upload image
                if ($request->hasFile('product_image')) {
                    $image_tmp = Input::file('product_image');
                    if ($image_tmp->isValid()) {
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(1, 999999) . '.' . $extension;
                        $larger_image_path = 'images/frontend_images/products/large/' . $filename;
                        $medium_image_path = 'images/frontend_images/products/medium/' . $filename;
                        $small_image_path = 'images/frontend_images/products/small/' . $filename;
                        //Resize images
                        Image::make($image_tmp)->save($larger_image_path);
                        Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(300, 300)->save($small_image_path);
                        //Store the image name in the products table
                        $product->image = $filename;
                    }
                }
                $product->save();
                return redirect('/admin/view_products')->with('flash_message_success', 'Product added Successfully');
            }
            $categories = Category::where(['parent_id' => 0])->get();
            $categories_dropdown = "<option selected disabled>Select<option>";
            foreach ($categories as $cat) {
                $categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . "<option>";
                $sub_categories = Category::where(['parent_id' => $cat->id])->get();
                foreach ($sub_categories as $sub_cat) {
                    $categories_dropdown .= "<option value='" . $sub_cat->id . "'>&nbsp;--&nbsp;" . $sub_cat->name . "<option>";
                }
            }
            return view('admin.products.add_product')->with(compact('categories_dropdown'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function viewProducts() {
        if (Session::has('adminSession')) {
            $products = Product::get();
            return view('admin.products.view_products')->with(compact('products'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
