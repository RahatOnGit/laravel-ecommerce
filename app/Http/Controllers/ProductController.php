<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function all_products()
    {
        
        $data = Product::all();
        $category = Category::all();

        $count = '';

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }


        return view('products.all_products',['data'=>$data,
           'category'=>$category, 'category_name'=>'','count'=>$count]);
    }

    function filter_by_category(Request $request)
    {
        $category__ =  $request->category;
        
        $data = Product::where('category',$category__)->get();

        $count = '';

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }

       
        if($request->category=="all")
        {
            $data = Product::all();
        }

        $category = Category::all();


        return view('products.all_products',['data'=>$data,
           'category'=>$category,'category_name'=>$category__,
        'count'=>$count]);


   }
}
