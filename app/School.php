<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';
    protected $primaryKey = 'id_school';
    protected $fillable = [
        'user_id', 'nama_sekolah', 'alamat_sekolah', 'gelar', 'ipk', 'bidang_studi', 
        'tgl_mulai_kelulusan', 'tgl_akhir_kelulusan'
    ];

    public function get_degree(){
    	return $this->belongsTo(Degree::class, 'gelar', 'id_degrees');
    }
    
    public function get_user(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
