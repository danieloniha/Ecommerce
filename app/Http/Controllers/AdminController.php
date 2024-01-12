<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;  

class AdminController extends Controller
{
    //
    public function view_category(){

        $data = Category::all();
        return view('admin.category', compact('data'));

    }

    public function add_category(Request $request){

        $data = new Category;

        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');

    }

    public function delete_category($id){

        $data = Category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
        
    }

    public function view_product(){

        $categories = Category::all();
        return view('admin.product', compact('categories'));

    }

    public function add_product(Request $request){

        $products = new Product; 

        $products->title = $request->title;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->quantity = $request->quantity; 
        $products->discount_price = $request->dis_price;
        $products->category = $request->category;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $products->image = $imagename;


        $products->save();

        return redirect()->back()->with('message', 'Product Added Successfully');

    }

    public function show_product(){
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id){
        $product = product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function edit_product($id){
        $product = Product::find($id);

        $categories = Category::all();

        return view('admin.edit_product', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id){
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity; 
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;

        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }
        $product->save();

        return redirect()->back()->with('message', 'Product Updated Successfully');

    }

    public function order(){

        $order = Order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id){

        $order = Order::find($id);
        $order -> delivery_status = "delivered";
        $order -> payment_status = "Paid";

        $order->save();

        return redirect()->back();

    }

    public function print_pdf($id){

        $order = Order::find($id);
        // $pdf = PDF::loadView('admin.pdf', compact('order'));
        // return $pdf->download('order_details.pdf');

    }

}
