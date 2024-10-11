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
        Schema::create('articels', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->uuid('categoryarticle_id');
            $table->text('description');
            $table->text('content');
            $table->string('status');
            $table->integer('posittion');
            $table->string('thumbnail');
            $table->boolean('delete');
            $table->dateTime('DeleteAt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articels');
    }
};
