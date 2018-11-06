<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller {

    public function addCategory(Request $request) {

        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $category = new Category;
                $category->name = $data['category_name'];
                $category->parent_id = $data['parent_id'];
                $category->description = $data['description'];
                $category->url = $data['url'];
                $category->save();
                return redirect('/admin/view_categories')->with('flash_message_success', 'Category added Successfully');
            }
            $levels = Category::where(['parent_id'=>0])->get();
            return view('admin.categories.add_category')->with(compact('levels'));
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

    public function editCategory(Request $request, $id = null) {
        //Only authenticated users can make calls to this method
        if (Session::has('adminSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                Category::where(['id' => $id])->update(['name' => $data['category_name'], 'parent_id'=> $data['parent_id'], 'description' => $data['description'], 'url' => $data['url']]);
                return redirect('/admin/view_categories')->with('flash_message_success', 'Category updated Successfully');
            }
            $categoriesDetails = Category::where(['id' => $id])->first();
            $levels = Category::where(['parent_id'=>0])->get();
            return view('admin.categories.edit_category')->with(compact('categoriesDetails','levels'));
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

    public function deleteCategory($id = null) {
        //Only authenticated users can make calls to this function
        if (Session::has('adminSession')) {
            if (!empty($id)) {
                Category::where(['id' => $id])->delete();
                return redirect()->back()->with('flash_message_success', 'Category Deleted Successfully');
            }
        } else {
            return redirect('/admin')->with('flash_message_error', 'Access denied! Please Login first');
        }
    }

}
