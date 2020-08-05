<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table = 'degrees';
    protected $primaryKey = 'id_degrees';
    protected $fillable = [
        'name_degrees'
    ];

    public function get_school(){
    	return $this->hasMany('App\\School', 'gelar', 'id_degrees');
	}
}
