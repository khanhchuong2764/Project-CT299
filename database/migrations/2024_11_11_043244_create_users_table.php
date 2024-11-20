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
        Schema::create('usersCl', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('fullname');
            $table->string('email');
            $table->string('password');
            $table->uuid('tokenUser')->default(Str::uuid()); // Đặt giá trị mặc định là UUID ngẫu nhiên
            $table->string('phone')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('status')->default("active");
            $table->boolean('delete')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersCl');
    }
};
