<?php

namespace App\Http\Controllers;
use App\Models\order_details;
use App\Models\orders;
use App\Models\Product;
use App\Models\category;
use App\Models\product_details;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class homeController extends Controller
{
    
    public function index()
{

    $listProducts = new Collection(); 
    $menu = Category::orderBy("id", "desc")->paginate();
    
    // Kiểm tra xem có đủ phần tử trong $menu hay không trước khi truy cập
   
    $i = 0;
    if ($menu->count() >= 3) {
        while ($i < 3) { // Thay vì do...while, bạn nên sử dụng while và chỉ cần chạy 3 lần nếu có đủ menu
            $items = Product::where('category_id', $menu[$i]->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $listProducts[$i] = $items; // Sử dụng $listProducts[$i] để lưu trữ kết quả của mỗi truy vấn
            $i++;
        }
    }
    
    return view("user.index", [
        "menu" => $menu,
        "listProducts" => $listProducts,
    ]);
}

public function products(Request $request)
{
    $a = new Product();
    $keyword = $request->input('keyword');
    $quantity = $request->input('quantity');
    $type = 0;

    if ($request->has('keyword')) {
        $products = $a->search($keyword, null, null, null, null, null, null, 10);
        $type = 1;
    } else {
        $products = Product::orderBy("id", "desc")->paginate(10);
        $type = 2;
    }

    return view("product.index", [
        "productes" => $products,
        "type" => $type
    ]);
}

public function productsCategory($id)
{
  

    $products = Product::where('category_id', $id)
        ->orderBy('created_at', 'desc')
        ->paginate(20);

    return view("user.product", [
        "products" => $products,
       
    ]);
}

public function product($id)
{
    $producte = Product::findOrFail($id);
    $maus = product_details::where('product_id', $id)->paginate();
   
    return view("user.product-details", [
        "producte" => $producte,
        "maus"=>$maus
    ]);
}


public function addCart(Request $request){
    // session()->flush();
    $cart=session()->get('cart');
    $id=$request->input('mau');
    $quantity=$request->input('quantity');
    $product_details=product_details::findOrFail($id);
    $product = product::findOrFail($product_details->product_id);
    $cart[$id]=[
        'name'=>$product ->name,
        'mau'=>$product_details->color,
        'quantity'=>$quantity,
        'img'=>$product ->thumbnail,
        'total'=>$quantity*$product ->discount,
    ];
    
    session()->put('cart',$cart);
    return back()->with('message', 'sản phẩm đã add');
}


public function updateCart(Request $request,$id){
    
    $cart=session()->get('cart');
    
    $quantity=$request->input('quantity');
    
    $product_details=product_details::findOrFail($id);
    $product = product::findOrFail($product_details->product_id);
  
    $cart[$id]=[
        'name'=>$product ->name,
        'quantity'=>$quantity,
        'total'=>$quantity*$product ->discount,
        'img'=>$product ->thumbnail,
        'mau'=>$product_details->color
    ];
    
    session()->put('cart',$cart);
    return back()->with('message', 'sản phẩm đã upload');
}


public function deleteCart($id){
    $cart=session()->get('cart');
   
    unset($cart[$id]);
    session()->put('cart',$cart);
    return back()->with('message', 'sản phẩm đã delete');
}


public function ShowCard(){
    
   
    $cart=session()->get('cart');
   
   
   return view("user.cart",['cart'=>$cart]);
}


public function VaoThanhToan(Request $request){
  
  
   return view("user.thanhToan");
}




public function ThanhToan(Request $request){
  
    
    $cart=session()->get('cart');
    $menu = Category::all();
    
    $data = $request->validate([
        'fullname' => ['required', 'string'],
        'email' => ['required', 'string'],
        'address' => ['required', 'string'],
        'phone_number' => ['required', 'string'],
        'note' => ['required', 'string'],

    ]);
    
   
    $hd=orders::create($data);
    $TongTien=0;
    
    foreach($cart as $id=>$item){

        $a=[
            "order_id"=>$hd->id,
            "product_id"=>$id,
            "price"=>null,
            "num"=> $item['quantity'],
            "total_money"=>$item['total'],
        ];
        
        $TongTien+=$item['total'];
        order_details::create($a);
        
    }
    $hd->total_money=$TongTien;
    $hd->save();
      
    return to_route('homes.index')->with('message', 'đã đặt đơn thành công mã kiểm tra đơn của bạn là'.$hd->id);
}


}