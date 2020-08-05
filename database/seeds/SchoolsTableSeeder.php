<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'user_id' => '1',
            'nama_sekolah' => 'SDN 1 Surakarta',
            'alamat_sekolah' => 'Jalan Raya Ahmad Yani no: 01 Surakarta',
            'gelar' => '1',
            'ipk' => null,
            'bidang_studi' => null,
            'tgl_mulai_kelulusan' => '2003-06',
            'tgl_akhir_kelulusan' => '2009-06',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('schools')->insert([
            'user_id' => '1',
            'nama_sekolah' => 'SMPN 1 Sukoharjo',
            'alamat_sekolah' => 'Jalan Raya Ahmad Yani no: 04 Sukoharjo',
            'gelar' => '1',
            'ipk' => null,
            'bidang_studi' => null,
            'tgl_mulai_kelulusan' => '2009-06',
            'tgl_akhir_kelulusan' => '2012-06',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('schools')->insert([
            'user_id' => '1',
            'nama_sekolah' => 'SMAN 1 Solo',
            'alamat_sekolah' => 'Jalan Raya Ahmad Yani no: 34 Solo',
            'gelar' => '2',
            'ipk' => null,
            'bidang_studi' => null,
            'tgl_mulai_kelulusan' => '2012-06',
            'tgl_akhir_kelulusan' => '2015-06',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);

        DB::table('schools')->insert([
            'user_id' => '1',
            'nama_sekolah' => 'Universitas 17 Agustus 1945 Semarang',
            'alamat_sekolah' => 'Jalan Raya Menur Pumpungan Semarang',
            'gelar' => '4',
            'ipk' => null,
            'bidang_studi' => 'Teknik Informatika',
            'tgl_mulai_kelulusan' => '2015-06',
            'tgl_akhir_kelulusan' => '2019-06',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            ]);
    }
}
