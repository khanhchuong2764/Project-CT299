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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();//
            $table->string('title');//
            $table->text('partials');//
            $table->string('id_product')->unique();//
            $table->text('uses');//
            $table->string('specifications');
            $table->text('howuse');//
            $table->uuid('category_id');//
            $table->uuid('id_unit');//
            $table->uuid('id_producers');
            $table->text('description');//
            $table->text('note');//
            $table->text('preserve');//
            $table->integer('price');//
            $table->integer('discountPercentage');//
            $table->integer('stock');//
            $table->string('status');//
            $table->integer('posittion');//
            $table->string('thumbnail');//
            $table->boolean('delete');//
            $table->dateTime('DeleteAt')->nullable();//
            $table->timestamps();//
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
