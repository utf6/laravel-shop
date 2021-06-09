<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('user_id')->comment('user_id');
            $table->string('province', 10)->default('')->comment('省份');
            $table->string('city', 10)->default('')->comment('城市');
            $table->string('area', 10)->default('')->comment('区县');
            $table->string('address', 45)->default('')->comment('详细地址');
            $table->unsignedInteger('zip_code')->comment('邮政编码');
            $table->string('name', 45)->default('')->comment('昵称');
            $table->string('phone', 15)->default('')->comment('手机号码');
            $table->dateTime('last_used_at')->nullable();
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
        Schema::dropIfExists('user_addresses');
    }
}
