<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\order_details;
use App\Models\product;
use App\Models\product_details;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

use App\Models\orders;
use Illuminate\Http\Request;
use Vtiful\Kernel\Format;

class ordersControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $orders = orders::orderBy("id", "desc")->paginate();

       
       

      
         
        
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
        $orders= new orders;
        
        $data=$orders->getOrderAll($id);
        $details = json_decode($data->details, true);
      
        return view("orders.show", ["dd" => $data,'details' => $details]);
          
        

      
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
    public function update(Request $request, $id)
    {

        $order = Orders::findOrFail($id); // Retrieve the order by its ID

        $status = $request->input('status'); // Get the status from the request
        
        $order->status = $status; // Update the status of the order
        
        $order->save(); // Save the updated order
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }

    public function print($id)
    {
        $orders= new orders;
        
        $data=$orders->getOrderAll($id);
        $details = json_decode($data->details, true);
        return view('orders.print',["dd" => $data,'details' => $details]);
    }
    public function DownloadOder($id)
    {   $orders= new orders;
        
        $data=$orders->getOrderAll($id);
        $details = json_decode($data->details, true);
        $pdf = Pdf::loadView('orders.print',["dd" => $data,'details' => $details]);
        $todayDate=Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice'.$id.'-'.$todayDate.'.pdf');
    }
}
