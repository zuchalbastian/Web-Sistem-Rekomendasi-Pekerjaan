<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobseeker extends Model
{
    protected $table = 'jobseekers';
    protected $primaryKey = 'id_jobseeker';
    protected $fillable = [
        'predict_id', 'kebutuhan', 'nama_perusahaan', 'kemampuan', 'pendidikan', 'usia',  'jenis_kelamin', 
        'pengalaman', 'bahasa', 'kemampuan_khusus', 'domisili'
    ];

    public function getFullNameAttribute()
    {
        return $this->kebutuhan . ' ' . $this->nama_perusahaan;
    }
}
