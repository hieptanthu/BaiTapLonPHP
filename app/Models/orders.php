<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class orders extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'id',
        'user_id ',
        'fullname',
        'email',
        'phone_number',
        'note',
        'status',
        'total_money',
        'address'// Xóa dấu phẩy ở đây
    ];

    function getTotalMoneyByMonth($year)
    {
        $totalMoneyByMonth = [];

        for ($month = 1; $month <= 12; $month++) {
            $startDate = Carbon::create($year, $month, 1)->startOfMonth();
            $endDate = $startDate->copy()->endOfMonth();

            $totalMoney = orders::whereBetween('created_at', [$startDate, $endDate])->sum('total_money');

            // Lưu tổng total_money của tháng vào mảng với key là tên tháng
            $totalMoneyByMonth[$startDate->format('F')] = $totalMoney;
        }

        return $totalMoneyByMonth;
    }

    function getOrderAll($id)
    {
        $billInfo = DB::table('orders as h')
            ->join('order_details as c', 'h.id', '=', 'c.order_id')
            ->leftJoin('product_details', 'c.product_id', '=', 'product_details.id')
            ->leftJoin('product', 'product_details.product_id', '=', 'product.id')
            ->where('h.id', '=', $id)
            ->select(
                'h.id',
                'h.fullname',
                'h.email',
                'h.phone_number',
                'h.note',
                'h.status',
                'h.total_money',
                'h.address',
                'h.created_at',
                DB::raw('CONCAT("[", GROUP_CONCAT(JSON_OBJECT("detail_id", c.id, "product_id", c.product_id, "color", product_details.color , "name",product.name, "discount",product.discount ,"total_money",c.total_money,"quantily",c.num)), "]") as details')
            )
            ->groupBy('h.id',
            'h.fullname',
            'h.email',
            'h.phone_number',
            'h.note',
            'h.status',
            'h.total_money',
            'h.address',
            'h.created_at')
            ->first();



        //     $billInfo = DB::table('orders as h')
        // ->leftJoin('ChiTietHoaDons as c', 'h.id', '=', 'c.id')
        // ->where('h.MaHoaDon', '=', $id)
        // ->select('h.*', DB::raw('JSON_QUERY((SELECT c.* FOR JSON PATH)) as list_json_chitiethoadon'))
        // ->get();

        return $billInfo;
    }


    public function order_details()
    {
        return $this->hasMany(order_details::class);
    }



}
