<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProgrammingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programmings')->insert([
            'name_programming' => 'Dibawah 1 Tahun',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
        
        DB::table('programmings')->insert([
            'name_programming' => '1 - 3 Tahun',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('programmings')->insert([
            'name_programming' => '3 - 5 Tahun',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
        
        DB::table('programmings')->insert([
            'name_programming' => 'Lebih Dari 5 Tahun',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
    }
}
