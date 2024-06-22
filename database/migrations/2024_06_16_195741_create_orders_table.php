<?php

use App\OrderStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlid('user_id')->constrained('users');
            $table->foreignUlid('product_id')->constrained('products');
            $table->foreignUlid('shipment_id')->constrained('shipments');

            $table->date('order_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->decimal('total', 10, 2)->nullable();

            $table->enum('status', OrderStatus::toArray())->default(OrderStatus::Pending);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
