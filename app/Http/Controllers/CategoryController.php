<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $categories = Category::all();
        return view('categories.category')->withCategories($categories);
    }


    public function addCategory(Request $request){
        $this->validate($request,[
            'category' => 'required'

        ]);
        $category = new Category();
        $category->category = $request->input('category');
        $category->save();
        return redirect('/category')->with('response','Category Added Successfully');
    }


    public function delete(Request $request)
    {
        $category = Category::find($request->id_category);

        $category->delete();

        return redirect('/home')->with('response','Category Deleted Successfully');
    }
}
