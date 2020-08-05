<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';
    protected $primaryKey = 'id_experience';
    protected $fillable = [
        'user_id', 'freshgraduate', 'programming', 'language'
    ];

    public function get_programming(){
    	return $this->belongsTo(Programming::class, 'programming', 'id_programming');
    }
    
    public function get_user(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
