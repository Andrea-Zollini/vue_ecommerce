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
            $table->ulid('id')->primary();

            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->decimal('price', 10, 2)->default(0.00);
            $table->integer('weight')->default(0)->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->string('image')->nullable();


            $table->foreignUlid('category_id')
                ->constrained('categories')
                ->nullable();

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
