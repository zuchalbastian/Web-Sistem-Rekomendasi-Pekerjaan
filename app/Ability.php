<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $table = 'list-ability';
    protected $primaryKey = 'id_ability';
    protected $fillable = [
        'name_ability'
    ];

    public function get_ability(){
    	return $this->hasMany('App\\Rating', 'name_rating', 'id_ability');
	}
}
