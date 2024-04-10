<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\tool\tool;


class categoryControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::orderBy("id", "desc")->paginate();
        

        return view("category.index",["categories" => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(category $category)
    {

        return view("category.create", ["category" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string']
        ]);

        category::create($data);


        return redirect()->route("Category.index")->with('message', 'Category was created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return view("category.show", ["category" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id); // Retrieve category by ID
        return view('category.update', ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string']
        ]);

        $category = Category::findOrFail($id); // Retrieve category by ID
        $category->update($data);


        return to_route('Category.index')->with('message', 'Note was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function offCategory($id)
    {   
        $category = Category::findOrFail($id);
        $tool = new tool();
        $data =$tool->delete($category->delete,2);
        $category->update($data);
        $products = product::where('category_id', $id)->get();

    // Thực hiện các thay đổi bạn muốn áp dụng cho mỗi sản phẩm
        foreach ($products as $product) {
            // Ví dụ: Cập nhật trạng thái sản phẩm
            $product->update($tool->delete($category->delete,3));
           
        }
        return to_route('Category.index')->with('message', 'Note was deleted');
    }

    public function onCategory(category $category)
    {

    }
}
