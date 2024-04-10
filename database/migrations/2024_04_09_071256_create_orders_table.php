<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('oders', function (Blueprint $table) {
            $table->id(); // ID chính, auto increment
            $table->unsignedBigInteger('user_id')->nullable()->index(); // Khóa ngoại cho mặc định là null và tạo chỉ mục
            $table->string('fullname', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('note', 1000)->nullable();
            $table->integer('status')->default(0);
            $table->integer('total_money')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oders');
    }
};
