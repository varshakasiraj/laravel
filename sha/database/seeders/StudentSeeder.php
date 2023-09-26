<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = app(Generator::class);
        for ($i=0; $i < 20; $i++) { 
            DB::table('student')->insert([
                'firstname' => $faker->name(),
                'lasttname' => $faker->name(),
                'email'=>$faker->unique()->safeEmail(),
                'password'=>Hash::make(10),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
    }
}
