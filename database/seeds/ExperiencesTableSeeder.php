<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experiences')->insert([
            'user_id' => '1',
            'freshgraduate' => 'Yes',
            'programming' => '1',
            'language' => 'Bahasa Indonesia',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
    }
}
