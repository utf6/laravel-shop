<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('no', 50)->unique()->nullable(true)->default('')->comment('订单编号');
            $table->unsignedInteger('user_id')->comment('用户id');
            $table->string('address', 255)->default('')->comment('收获地址');
            $table->decimal('total_amount')->comment('订单金额');
            $table->string('remark')->default('')->nullable()->comment('订单备注');
            $table->dateTime('paid_at')->nullable()->comment('支付时间');
            $table->string('payment_method', 45)->nullable()->default('')->comment('支付方式');
            $table->string('payment_no', 50)->nullable()->default('')->comment('支付平台订单号');
            $table->string('refund_no', 50)->nullable()->default('')->comment('	退款单号');
            $table->string('refund_status', 45)->default(\App\Models\Order::REFUND_STATUS_PENDING)->comment('退款状态');
            $table->boolean('closed')->default(false)->comment('订单是否关闭（0：未关闭，1：已关闭）');
            $table->boolean('reviewed')->default(false)->comment('订单是否已评价	（0：未评价，1：以评价）');
            $table->string('ship_status', 100)->default(\App\Models\Order::SHIP_STATUS_PENDING)->comment('物流状态');
            $table->text('ship_data')->nullable()->comment('物流数据');
            $table->text('extra')->nullable()->comment('其他额外的数据');
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
}
