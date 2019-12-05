<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoredProcedureToCoupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupon', function (Blueprint $table) {
            //
        });

        /**
         * stored procedure to get coupon
         */
        DB::unprepared('CREATE PROCEDURE GetCoupon(IN var_code varchar(255)) 
        BEGIN 
            SELECT * FROM coupons where code=var_code; 
        END');

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon', function (Blueprint $table) {
            //
        });
    }
}
