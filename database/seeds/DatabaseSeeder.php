<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BiodatasTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(ExperiencesTableSeeder::class);

        $this->call(AdminsTableSeeder::class);
        $this->call(DegreesTableSeeder::class);
        $this->call(ProgrammingsTableSeeder::class);
        $this->call(ListAbilityTableSeeder::class);
    }
}
