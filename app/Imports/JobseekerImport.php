<?php

namespace App\Imports;

use App\Jobseeker;
use Maatwebsite\Excel\Concerns\ToModel;

class JobseekerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new Jobseeker([
            'predict_id' => $row[1],
            'kebutuhan' => $row[2], 
            'nama_perusahaan' => $row[3], 
            'kemampuan' => $row[4], 
            'pendidikan' => $row[5], 
            'usia' => $row[6], 
            'jenis_kelamin' => $row[7], 
            'pengalaman' => $row[8], 
            'bahasa' => $row[9], 
            'kemampuan_khusus' => $row[10], 
            'domisili' => $row[11], 
        ]);
    }
}
