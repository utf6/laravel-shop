<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id')->index('order_id')->comment('所属订单ID');
            $table->unsignedInteger('product_id')->index('product_id')->comment('对应商品ID');
            $table->unsignedInteger('product_sku_id')->comment('对应商品SKU ID');
            $table->unsignedInteger('amount')->default(0)->comment('数量');
            $table->decimal('price', 10, 2)->comment('	单价');
            $table->unsignedInteger('rating')->nullable()->comment('用户打分');
            $table->text('review')->nullable();
            $table->timestamp('reviewed_at')->nullable()->comment('	用户评价');
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
        Schema::dropIfExists('order_items');
    }
}
