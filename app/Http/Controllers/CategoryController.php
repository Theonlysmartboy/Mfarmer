<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;
use Redirect;

class CategoryController extends Controller {

    public function addCategory(Request $request) {

        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $category = new Category;
                $category->name = $data['category_name'];
                $category->description = $data['description'];
                $category->url = $data['url'];
                if ($category->save()) {
                    return redirect('/admin/view_categories')->with('flash_message_success', 'Category added Successfully');
                } else {
                    return redirect('/admin/add_category')->with('flash_message_error', 'An error occured Please try again');
                }
            }
            return view('admin.categories.add_category');
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function viewCategories() {
        if (Session::has('adminSession')) {
            $categories = Category::get();
            return view('admin.categories.view_categories')->with(compact('categories'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
