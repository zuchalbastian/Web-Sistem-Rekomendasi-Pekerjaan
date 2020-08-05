<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class BiodatasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('biodatas')->insert([
            'user_id' => '1',
            'nama_depan' => 'Zuchal',
            'nama_belakang' => 'Ari Bastian',
            'profesi' => 'Programmer',
            'usia' => '22',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat_lengkap' => 'Jalan Raya A Yani Gedangan',
            'kota' => 'Semarang',
            'provinsi' => 'Jawa Tengah', 
            'kode_pos' => '61254',
            'nomor_hp' => '089867546789',
            'alamat_email' => 'nurime@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // $faker = Faker::create();
    	// foreach (range(1,10) as $index) {
        //     $firstName = $faker->firstName;
        //     $lastName = $faker->lastName;
        //     $username = $firstName.$lastName;
        //     $email = $firstName.$lastName.'@'.$faker->freeEmailDomain;
	    //     DB::table('biodatas')->insert([
	    //         // 'name' => $faker->name,
	    //         // 'email' => $faker->email,
        //         // 'password' => bcrypt('secret'),

        //         'nama_depan' => $firstName,
        //         'nama_belakang' =>  $lastName,
        //         'profesi' => $faker->jobTitle,
        //         'alamat_lengkap' => $faker->address,
        //         'kota' => $faker->city,
        //         'provinsi' => $faker->state,
        //         'kode_pos' => $faker->postcode,
        //         'nomor_hp' => $faker->e164PhoneNumber,
        //         'alamat_email' => $email,

        //         'sosial_media' => Str::random(10),
        //         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //         'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    //     ]);
	    // }
    }
}
