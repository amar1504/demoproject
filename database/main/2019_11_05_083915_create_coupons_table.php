<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coupon_title')->nullable();
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->double('discount')->nullable();
            $table->string('type');
            $table->enum('status',[0,1]);
            $table->timestamps();
            //$table->DateTime('deleted_at');
            $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
