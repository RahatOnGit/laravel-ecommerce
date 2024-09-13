<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype','user')->get()->count();

        $order = Order::all()->count();

        $delivered = Order::where('status','delivered')->get()->count();

        $product = Product::all()->count();       
        
        return view('admin.index',['user'=>$user,'order'=>$order,
    'delivered'=>$delivered, 'product'=>$product]);
    }

    public function home()
    {
        $data = Product::all();

        $count = '';

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }

       
        return view('home.index',['data'=>$data, 'count'=>$count]);
    }

    public function login_home()
    {
        $data = Product::all();

        $user = Auth::user();

        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();

        return view('home.index',['data'=>$data,'count'=>$count]);
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        $count = '';

        if(Auth::id())
        {
         $user = Auth::user();

         $userid = $user->id;

          $count = Cart::where('user_id',$userid)->count();

        }

        

        return view('home.product_details',['data'=>$data ,'count'=>$count]);
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        return redirect()->back()->with('message',"product has been added to the cart");;





    }

    public function mycart()
    {

        $count = '';
        $data = '';
        if(Auth::id())
        {
            $user = Auth::user();

            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id)->count();

            $data = Cart::where('user_id',$user_id)->get();
        }

        
        

        return view('home.mycart',['count'=>$count,'data'=>$data]);
    }

    function delete_cart($id)
    {
        $data = Cart::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $user = Auth::user();
        $user_id = $user->id;

        $cart = Cart::where('user_id',$user_id)->get();


        foreach($cart as $i)
        {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $i->user_id;
            $order->product_id = $i->product_id;

            $order->save();
        }

        foreach($cart as $i)
        {
            $data = Cart::find($i->id);
            $data->delete();
        }

        return redirect('/')->with('message','your order has been placed successfully');

        



    }

    public function myorders()
    {
        $count = '';

        $data = '';

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $data  = Order::where('user_id',$userid)->get();
    
            $count = Cart::where('user_id',$userid)->count();
        }

        return view('home.order',['data'=>$data, 'count'=>$count]);
    }

}
