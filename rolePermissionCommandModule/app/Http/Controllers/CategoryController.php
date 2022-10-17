<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryList(){
    $categories=Category::all();
//    dd($categories);
    return view('admin.pages.category-list',compact('categories'));
    }

    public function categoryCreate(){
        return view('admin.pages.product-category-create');
    }

    public function add(Request $request){
        // dd($request->all());

        $request->validate([
            'name'=>'required',
            'details'=>'required'
        ]);


//        table field name|| input field name
        Category::create([
            'name'=>$request->name,
            'details'=>$request->details
        ]);
        return redirect()->back()->with('success','Category Created Successfully.');
    }
}
