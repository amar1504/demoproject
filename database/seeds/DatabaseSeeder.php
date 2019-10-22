<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*$role=['superadmin','admin','inventory manager','order manager','customer'];
        for ($i=0; $i < 5; $i++) { 
            DB::table('roles')->insert([
                'role_name' => $role[$i],
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s"),
            ]);
        }*/
        
        DB::table('users')->insert([
            
            'firstname' =>'Admin',
            'lastname' =>'admin',
            'email' =>'kharwadeamar@gmail.com',
            'password' =>bcrypt('admin123'),
            'roles'=>2,
            'status'=>'0',
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
        ]); 

    }
}
