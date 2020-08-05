<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programming extends Model
{
    protected $table = 'programmings';
    protected $primaryKey = 'id_programming';
    protected $fillable = [
        'name_programming'
    ];

    public function get_experience(){
    	return $this->hasMany('App\\Experience', 'programming', 'id_programming');
	}
}
