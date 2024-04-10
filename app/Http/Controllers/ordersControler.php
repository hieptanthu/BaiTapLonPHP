<?php

namespace App\Http\Controllers;
use App\Models\order_details;
use App\Models\product;
use App\Models\product_details;
use Illuminate\Support\Carbon;

use App\Models\orders;
use Illuminate\Http\Request;

class ordersControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $orders = orders::orderBy("id", "desc")->paginate();

       
        $orders = orders::where('status', 0)->paginate();
        // dd($orders);
        return view("orders.index", ["dd" => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    { 
        $order = orders::findOrFail($id); // Thay $order_id bằng ID cụ thể của đơn hàng bạn muốn tìm
      
        $order_details = order_details::where('order_id', $order->id)->first(); // Lấy chi tiết đơn hàng đầu tiên (hoặc theo yêu cầu)
        
        if ($order_details) {
            $product_details = product_details::findOrFail($order_details->product_id); // Lấy chi tiết sản phẩm từ chi tiết đơn hàng
            $product = product::findOrFail($product_details->product_id);
            return view("orders.show", ["order" => $order,"order_details"=>$order_details,"product_details"=>$product_details,"product"=>$product]); // Lấy sản phẩm từ chi tiết sản phẩm
        } else {
            dd("looix");
            return view("orders.show", ["dd" => $order]);
        }

      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }
}
