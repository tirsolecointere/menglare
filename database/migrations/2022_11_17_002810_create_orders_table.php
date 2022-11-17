<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->enum('status', [
                Order::PENDING,
                Order::RECEIVED,
                Order::SHIPPED,
                Order::DELIVERED,
                Order::CANCELED,
            ])->default(Order::PENDING);

            $table->enum('shipping_type', [
                Order::DELIVERY,
                Order::PICKUP
            ]);

            $table->float('shipping_cost');
            $table->float('total');
            $table->json('content');
            $table->string('address');

            $table->foreignId('user_id')->constrained();
            $table->foreignId('department_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('district_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
