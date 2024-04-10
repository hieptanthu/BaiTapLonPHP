<?php

namespace App\Http\Controllers;

use App\Models\product_details;
use App\Models\product;
use Illuminate\Http\Request;

class product_detailsControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'color' => ['required', 'string'],
            'product_id' => ['required', 'string'],
            
        ]);

        $data2 = [
            'quantity'=>0,
        ];
        $data = array_merge($data, $data2);
        

        product_details::create($data);
        

        return back()->with('message', ' was updated');
    }

    /**
     * Display the specified resource.
     */
    public function show($productId)
    {
       
        $product_details = product_details::where('product_id', $productId)
                                           ->orderBy('id', 'desc')
                                           ->paginate();
    
        return view("product_details.show", ["product_details" => $product_details,"productId"=> $productId]);
        // return view("product_details.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product_details $product_details)
    {
        return view("product_details.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $product_id)
    {
       
        
        $product_details = product_details::where('product_id', $product_id)
        ->orderBy('id', 'desc')
        ->paginate();
        
        $parameters = $request->request->all();
     
     
        foreach ($parameters as $key => $value) {
            if($key!='_token' && $key!='_method'){
                foreach ($product_details as $product_detail) {
                    // Kiểm tra điều kiện để tìm phần tử cần cập nhật
                    if ($product_detail->id == $key) {
                        // Thực hiện cập nhật cho phần tử này
                        $data=["color" => $value];
                        $product_detail->update($data);
                        // Kết thúc vòng lặp nếu bạn chỉ muốn cập nhật một phần tử đầu tiên thỏa mãn điều kiện
                        
                    }
                }
            }
            
        }
       
        return back()->with('message', ' was updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product_details $product_details)
    {
        return view("product_details.index");
    }

   
}
