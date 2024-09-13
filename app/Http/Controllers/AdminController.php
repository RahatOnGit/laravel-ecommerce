<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category',['data'=>$data]);
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category',['data'=>$data]);

    }

    public function update_category($id, Request $request)
    {
      $data = Category::find($id);

      $data->category_name = $request->category;

      $data->save();

      return redirect('/view_category')->with('message',"category updated succuessfully");


    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product',['category'=> $category]);
    }

    public function upload_product(Request $request)
    {
        $validated = $request->validate([
            
            'category' => 'sometimes',
        ]);

        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->qty;

        if($request->image)
        {
            $imageNewName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move('products',$imageNewName);

            $data->image = $imageNewName;
        }

        $data->save();

        return redirect('/view_product')->with('message',"product has been inserted in the list succuessfully");
    }

    public function view_product()
    {
        $data = Product::paginate(5);

        return view('admin.view_product',['data'=>$data]);

    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

        if($data->image!='' && file_exists($image_path))
        {
            unlink($image_path);
        }

       

           

    

         
        $data->delete();

        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);

        $all_category = Category::all();

        return view('admin.update_page',['data'=>$data,'all_category'=>$all_category]);
    }

    public function edit_product(Request $request, $id)
    {
      

        $data = Product::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->qty;

        if($request->image)
        {

        $image_path = public_path('products/'.$data->image);

        if($data->image!='' && file_exists($image_path))
        {
            unlink($image_path);
        }

            $imageNewName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move('products',$imageNewName);

            $data->image = $imageNewName;
        }

        $data->save();

        

        return redirect('/view_product');

        


    }

    public function product_search(Request $request)
    {
        $search = $request->search;

        $data = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);


        return view('admin.view_product',['data'=>$data]);
    }

    public function view_order()
    {
        $orders = Order::all();
        return view('admin.order',['orders'=>$orders]);
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);

        $data->status = 'on the way';

        $data->save();

        return redirect()->back();
    }

    public function delivered($id)
    {
        $data = Order::find($id);

        $data->status = 'delivered';

        $data->save();

        return redirect('/view_order');
    }
    
    public function print_pdf($id)
    {

        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice',['data'=>$data]);

        return $pdf->download('invoice.pdf');
    }
   
}
