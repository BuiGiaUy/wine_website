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
            $table->bigInteger('category_id')->constrained('categories')->onDelete('cascade');
            $table->text('name');
            $table->text('slug')->unique();;
            $table->text('barcode')->unique();;
            $table->text('description');
            $table->bigInteger('quantity');
            $table->bigInteger('price');
            $table->bigInteger('discount_percent');
            $table->bigInteger('viewer')->default(0);
            $table->double('rating_number')->default(0);
            $table->integer('rating_value')->default(0);
            $table->bigInteger('brand_id')->constrained('brands')->onDelete('cascade');
            $table->bigInteger('post_id')->constrained('posts')->onDelete('cascade');
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
