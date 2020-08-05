<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ListAbilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list-ability')->insert([
            'name_ability' => 'PHP',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('list-ability')->insert([
            'name_ability' => 'Javascript',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('list-ability')->insert([
            'name_ability' => 'Java',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('list-ability')->insert([
            'name_ability' => 'SQL',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('list-ability')->insert([
            'name_ability' => 'C++/C#',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('list-ability')->insert([
            'name_ability' => 'HTML/CSS',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('list-ability')->insert([
            'name_ability' => 'Python',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('list-ability')->insert([
            'name_ability' => 'Framework',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
    }
}
