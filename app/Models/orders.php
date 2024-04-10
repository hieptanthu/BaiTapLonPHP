<?php

namespace App\Models;

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


}
