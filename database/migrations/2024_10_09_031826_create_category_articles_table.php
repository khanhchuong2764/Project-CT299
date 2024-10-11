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
        Schema::create('category_articles', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->uuid('parentID');
            $table->text('description');
            $table->string('status');
            $table->integer('posittion');
            $table->string('thumbnail');
            $table->boolean('delete');
            $table->time('DeleteAt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_articles');
    }
};
