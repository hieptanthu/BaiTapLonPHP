<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\product;
use Illuminate\Http\Request;

use App\Models\category;
use App\Http\tool\tool;

class productControler extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request =null)
    {  $tool = new tool();
        $a = new product();
        $keyword = request()->input('keyword');
        $quantity = request()->input('quantity');

    
        if (request()->has('keyword')) {
            $productes= $a->search($keyword,null, null, null, null, null, null,10);

        } else {
            $productes = Product::orderBy("id", "desc")->paginate(10);
        }
    
        return view("product.index", ["productes" => $productes, 'tool' => $tool]);
    }


    public function search()
    {
       
        // $a = new product();
     
    }


    public function create()
    {
        $categories = category::orderBy("id", "desc")->paginate();
        
        return view("product.create", ["categories" => $categories]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'price' => ['required', 'integer'], // Thay đổi kiểu dữ liệu thành integer
            'discount' => ['required', 'integer'], // Kiểu dữ liệu integer cho discount
            'description' => ['required', 'string'],
            'category_id' => ['required', 'string'] ,
            // Loại bỏ dấu cách phía sau
        ]);
        $data["category_id"] = (int) $data["category_id"];
        $tool = new tool();
        if (!$request->hasFile('image2') && $request->hasFile('image')) {
            $imagePath = [
                "thumbnail" => $tool->upImg($request, 'image', $data['name']),
                "thumbnail2" => ""
            ];
            $data = array_merge($data, $imagePath);
            $imagePath = [
                'stock_quantity'=>0,
                'quantity'=>0,
            ];
            $data = array_merge($data, $imagePath);
            product::create($data);
        } elseif ($request->hasFile('image2') && $request->hasFile('image')) {
            $imagePath = [
                "thumbnail" => $tool->upImg($request, 'image', $data['name']),
                "thumbnail2" => $tool->upImg($request, 'image2', $data['name'])

            ];

           
            $data = array_merge($data, $imagePath);
            $imagePath = [
                'stock_quantity'=>0,
                'quantity'=>0,
            ];
            $data = array_merge($data, $imagePath);


            product::create($data);
        } else {
            return redirect()->route("Product.index")->with('message', 'product was created false.');
        }


        return redirect()->route("Product.index")->with('message', 'product was created.');





    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return view("product.show", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {


        $product = product::findOrFail($id); // Retrieve product by ID
        $categories = category::orderBy("id", "desc")->paginate();


        return view('product.update', ["product" => $product], ["categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tool = new tool();
        $data = $request->validate([
            'name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'price' => ['required', 'integer'], // Thay đổi kiểu dữ liệu thành integer
            'discount' => ['required', 'integer'], // Kiểu dữ liệu integer cho discount
            'description' => ['required', 'string'],
            'category_id' => ['required', 'string'] // Loại bỏ dấu cách phía sau
        ]);
        $data["category_id"] = (int) $data["category_id"];

        if ($request->hasFile('image') || $request->hasFile('image2')) {


            if ($request->hasFile('image') && $request->hasFile('image2') == false) {

                $imagePath = [
                    "thumbnail" => $tool->upImg($request, 'image', $data['name']),
                ];


            } elseif ($request->hasFile('image2') && $request->hasFile('image1') == false) {

                $imagePath = [
                    "thumbnail2" => $tool->upImg($request, 'image2', $data['name'])
                ];

            } else {

                $imagePath = [
                    "thumbnail" => $tool->upImg($request, 'image', $data['name']),
                    "thumbnail2" => $tool->upImg($request, 'image2', $data['name'])
                ];


            }



            $data = array_merge($data, $imagePath);

        }


        $product = product::findOrFail($id);

        $data = array_merge($data, $tool->delete($product->delete, 2));

        $product->update($data);
        return back()->with('message', 'Note was updated');


    }


    public function OnAndOffproduct($id)
    {

       
        $product = product::findOrFail($id);
        $tool = new tool();
        //cho vào 2 trạng thái có dữ liệu và không có dữ liệu 
        $data = $tool->delete($product->delete, 2);
       
        $product->update($data);

        // Thực hiện các thay đổi bạn muốn áp dụng cho mỗi sản phẩm

         return back()->with('message', 'Note was deleted');
    }


  


}
