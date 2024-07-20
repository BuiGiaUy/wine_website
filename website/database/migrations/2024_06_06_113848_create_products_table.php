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
            $table->id();
            $table->foreignId('category_id')->constrained('categories', 'id')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands', 'id')->onDelete('cascade');
            $table->foreignId('post_id')->constrained('posts', 'id')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('barcode')->unique();
            $table->text('description');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('discount_percent');
            $table->unsignedBigInteger('viewer')->default(0);
            $table->double('rating_number')->default(0);
            $table->unsignedInteger('rating_value')->default(0);
            $table->timestamps();
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
