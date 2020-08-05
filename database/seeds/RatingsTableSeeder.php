<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert([
            'user_id' => '1',
            'name_rating' => '2',
            'rating' => 3.5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
        
        DB::table('ratings')->insert([
            'user_id' => '1',
            'name_rating' => '1',
            'rating' => 4.5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
            
       DB::table('ratings')->insert([
            'user_id' => '1',
            'name_rating' => '7',
            'rating' => 2.5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
    }
}


