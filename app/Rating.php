<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'id_rating';
    protected $fillable = [
        'user_id', 'name_rating', 'rating'
    ];

    public function get_ability(){
    	return $this->belongsTo(Ability::class, 'name_rating', 'id_ability');
    }

    public function get_user(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
