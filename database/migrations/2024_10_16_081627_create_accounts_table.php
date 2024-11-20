<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('fullname');
            $table->string('email');
            $table->string('password');
            $table->uuid('tokenacc')->default(Str::uuid()); // Đặt giá trị mặc định là UUID ngẫu nhiên
            $table->string('phone');
            $table->string('avatar');
            $table->string('status');
            $table->boolean('delete')->default(false); // Đặt giá trị mặc định cho cột 'delete'
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
