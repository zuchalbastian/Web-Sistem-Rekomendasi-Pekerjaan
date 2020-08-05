<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DegreesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degrees')->insert([
            'name_degrees' => 'Tidak Ada Gelar',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
        
        // DB::table('degrees')->insert([
        //     'name_degrees' => 'Ahli Pratama (A.P.) / Diploma I',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        //     ]);

        // DB::table('degrees')->insert([
        //     'name_degrees' => 'Ahli Muda (A.Ma.) / Diploma II',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        //     ]);
        
        // DB::table('degrees')->insert([
        //     'name_degrees' => 'Ahli Madya (A.Md.) / Diploma III',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        //     ]);

        // DB::table('degrees')->insert([
        //     'name_degrees' => 'Sarjana Sains Terapan (S.S.T.) / Diploma IV',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        //     ]);

        // DB::table('degrees')->insert([
        //     'name_degrees' => 'Sarjana (S1)',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        //     ]);

        // DB::table('degrees')->insert([
        //     'name_degrees' => 'Magister (S2)',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        //     ]);

        // DB::table('degrees')->insert([
        //     'name_degrees' => 'Doktor (S3)',
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        //     ]);

        DB::table('degrees')->insert([
                'name_degrees' => 'SMK',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                ]);

        DB::table('degrees')->insert([
                'name_degrees' => 'D3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                ]);

        DB::table('degrees')->insert([
                'name_degrees' => 'S1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
                ]);
        
    }
}
