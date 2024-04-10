<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;

class adminControler extends Controller
{
    public function index()
    {
        $orderModel = new orders();
        $ordersWithStatusZero = orders::where('status', 0)->count();
        $totalMoneyByMonth = $orderModel->getTotalMoneyByMonth(2024);
        
        

        return view("admin.index",["table" => $totalMoneyByMonth,"oders"=>$ordersWithStatusZero]);
    }
}
