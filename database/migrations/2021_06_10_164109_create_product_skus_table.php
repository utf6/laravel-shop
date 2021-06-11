<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_skus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->default('')->comment('SKU 名称');
            $table->string('description')->default('')->comment('SKU 描述');
            $table->decimal('price', 10, 2)->comment('SKU价格');
            $table->unsignedInteger('stock')->default(0)->comment('库存数');
            $table->unsignedInteger('product_id')->default(0)->index('product_id')->comment('所属商品 id');
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
        Schema::dropIfExists('product_skus');
    }
}
