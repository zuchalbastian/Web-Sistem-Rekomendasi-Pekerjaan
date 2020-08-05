<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodatas';
    protected $primaryKey = 'id_biodata';
    protected $fillable = [
        'user_id', 'nama_depan', 'nama_belakang', 'profesi', 'usia', 'jenis_kelamin',  'alamat_lengkap', 
        'kota', 'provinsi', 'kode_pos', 'nomor_hp', 'alamat_email'
    ];

    public function get_user(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
