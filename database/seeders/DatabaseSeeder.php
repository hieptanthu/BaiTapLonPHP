<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\orders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        orders::factory()->create([
            'email' => 'test@example.com',
            'fullname'=>'ss',
            'total_money'=>1211
        ]);
        orders::factory(1000)->create([
            'created_at' => Carbon::now()->startOfMonth()->addMonths(rand(0, 11)) // Ngẫu nhiên từ tháng 1 đến tháng 12 trong các năm trước đó
        ]);
    }
}
