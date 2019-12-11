<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_name=['tshirt','jacket'];
        $size=['xl','l'];
        $color=['yelloe','green'];
        $pid=[1,2];
        $image1='productimages/tiDWIqb5UWuBhXf5JnpjFGhFy69bHeVcErTBtC4a.jpeg';
        $image2=['productimages/OY85AQGLa8SO0Ve665zBUeHTt1AJt7GnRfBHLuYS.jpeg','productimages/l0bbBh5rvTtMWsKSJY0iTkPIsxCRiYO6bVfuNLZL.jpeg','productimages/ttHYf7DXPeZcW7PaREzKKodRCIuxbNHcWwQP491V.jpeg'];
        
        for ($i=0; $i < 2; $i++) {
            DB::table('products')->insert([
                'category_id' => 2,
                'product_name' => $product_name[$i],
                'price'=>12,
                'description'=>'test',
                'quantity'=>'10',
                'status'=>'1',
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
            ]);
        }

        for ($i=0; $i < 2; $i++) {
            DB::table('product_attributes_assoc')->insert([
                'product_id' => $pid[$i],
                'size' => $size[$i],
                'color'=>$color[$i],
                'type'=>'regular',
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
            ]);
        }

        for ($i=0; $i < 2; $i++) {
            DB::table('product_categories')->insert([
                'product_id' => $pid[$i],
                'category_id' => 2,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
            ]);
        }

        
        DB::table('product_images')->insert([
            'product_id' => 1,
            'product_image'=>$image1,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
        ]);

        for ($i=0; $i < 3; $i++) {
            DB::table('product_images')->insert([
                'product_id' => 2,
                'product_image'=>$image2[$i],
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
            ]);
        }
        


    }
}
