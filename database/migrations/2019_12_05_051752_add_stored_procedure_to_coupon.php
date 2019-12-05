<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoredProcedureToCoupon extends Migration
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
         * stored peocedure to insert coupon
         */
        DB::unprepared("CREATE PROCEDURE InsertCoupons(IN var_coupon_title varchar(255), IN var_code varchar(255),IN var_description  text,IN var_discount decimal, IN var_quantity int,IN var_type varchar(255),IN var_status varchar(255))
        BEGIN
            INSERT INTO coupons(coupon_title,code,description,discount,quantity,type,status) VALUES(var_coupon_title,var_code,var_description,var_discount,var_quantity,var_type,var_status);
        END");

        /**
         * store procedure to get coupons
         */
        DB::unprepared('CREATE PROCEDURE GetCoupons() 
        BEGIN 
            SELECT * FROM coupons; 
        END');

        /**
         * store procedure to update coupon
         */
        DB::unprepared("CREATE PROCEDURE UpdateCoupons(IN var_coupon_title varchar(255), IN var_code varchar(255),IN var_description  text,IN var_discount decimal, IN var_quantity int,IN var_type varchar(255),IN var_status varchar(255),IN var_id int)
        BEGIN
          UPDATE coupons SET coupon_title=var_coupon_title,code=var_code,description=var_description,discount=var_discount,quantity=var_quantity,type=var_type,status=var_status where id=var_id;
        END");

        /**
         * store procedure to delete coupon
         */
        DB::unprepared("CREATE PROCEDURE DeleteCoupons(IN var_id int)
        BEGIN
            DELETE FROM coupons where id=var_id;
        END");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon', function (Blueprint $table) {
            DB::unprepared('DROP PROCEDURE IF EXISTS InsertCoupons');
            DB::unprepared('DROP PROCEDURE IF EXISTS GetCoupons');
            DB::unprepared('DROP PROCEDURE IF EXISTS UpdateCoupons');
            DB::unprepared('DROP PROCEDURE IF EXISTS DeleteCoupons');
        });
    }
}
