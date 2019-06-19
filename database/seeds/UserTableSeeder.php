<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10; $i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                "name"=> "Utilisateur$i",
                "email"=> "Utilisateur$i@gmail.com",
                "password"=>bcrypt('0000')
            ]);
        }
    }
}
