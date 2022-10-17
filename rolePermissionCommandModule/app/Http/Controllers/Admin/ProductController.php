<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList(Request $request)
    {
        $search = $request->query('search');
        if($search){
            $products = Product::with('category')->where('name','Like', '%'.$search.'%')
                ->orWhere('price','like','%'.$search.'%')->get();
            return view('admin.pages.product-list',compact('products'));
        }
        $products = Product::with('category')->get();

        return view('admin.pages.product-list',compact('products'));
    }


    public function productCreateForm()
    {
        $categories = Category::all();

        return view('admin.pages.create-product',compact('categories'));
    }

    public function productStore(Request $request){



                $image_name=null;
//              step 1: check image exist in this request.
                 if($request->hasFile('product_image'))
                 {
                     // step 2: generate file name
                     $image_name=date('Ymdhis') .'.'. $request->file('product_image')->getClientOriginalExtension();

                     //step 3 : store into project directory

                     $request->file('product_image')->storeAs('/products',$image_name);

                 }

        Product::create([
            // field name from db || field name from form
            'name'=>$request->name,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'details'=>$request->details,
            'image'=>$image_name,
        ]);

        return redirect()->back()->with('success','Product created successfully.');

    }

    public function productDetails($product_id)
    {

//        collection= get(), all()====== read with loop (foreach)
//       object= first(), find(), findOrFail(),======direct
      $product=Product::find($product_id);
//      $product=Product::where('id',$product_id)->first();
        return view('admin.pages.product-details',compact('product'));
    }

    public function productDelete($product_id)
    {
       Product::find($product_id)->delete();
       return redirect()->back()->with('success','Product Deleted.');
    }

    public function productEdit($id)
    {

        $product=Product::find($id);
//        $product=Product::where('user_id',$id)->first();

//        dd($product);
        $all_categories=Category::all();
//        dd($all_categories);
        return view('admin.pages.edit-product',compact('all_categories','product'));

    }

    public function productUpdate(Request $request,$id)
    {


        $product=Product::find($id);

//        Product::where('column','value')->udpate([
//            'column'=>'request form field name'
//        ]);

        $image_name=$product->image;
//              step 1: check image exist in this request.
        if($request->hasFile('product_image'))
        {
            // step 2: generate file name
            $image_name=date('Ymdhis') .'.'. $request->file('product_image')->getClientOriginalExtension();

            //step 3 : store into project directory

            $request->file('product_image')->storeAs('/products',$image_name);

        }


        $product->update([
            // field name from db || field name from form
            'name'=>$request->name,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'details'=>$request->details,
            'image'=>$image_name,

        ]);
        return redirect()->route('admin.product.list')->with('success','Product Updated Successfully.');
    }
}
