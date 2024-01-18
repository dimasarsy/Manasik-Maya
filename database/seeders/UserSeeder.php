<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $password1 = Hash::make('tono123');
        $password2 = Hash::make('rini123');
        $password3 = Hash::make('rita123');
        $password4 = Hash::make('amazonvin12');
        DB::table('users')->insert(
            [
                [
                    "username" => "tono",
                    "email" => "tono@gmail.com",
                    "password" => $password1,
                    "name" => "Tono Bill",
                    "address" => "Jl. Mt haryono",
                    "gender" => "male",
                    "dob" => "1964-03-04",
                    "role_id" => 2
                ],
                [
                    "username" => "rini",
                    "email" => "rini@gmail.com",
                    "password" =>  $password2,
                    "name" => "Rini Kuskis",
                    "address" => "Jl. Kolonel haryono",
                    "gender" => "female",
                    "dob" => "1984-06-21",
                    "role_id" => 3
                ],
                [
                    "username" => "rita",
                    "email" => "rita@gmail.com",
                    "name" => "Rita Ruminin",
                    "password" =>  $password3,
                    "address" => "Jl. Garut Jaya",
                    "gender" => "female",
                    "dob" => "1988-03-21",
                    "role_id" => 3
                ],
                [
                    "username" => "amazonvin12",
                    "email" => "amazonvin12@gmail.com",
                    "name" => "Amazon Vin",
                    "password" =>  $password4,
                    "address" => "Jl. Menteng Agung",
                    "gender" => "male",
                    "dob" => "1993-05-11",
                    "role_id" => 2
                ],
            ]
        );
    }
}
