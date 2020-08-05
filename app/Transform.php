<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transform extends Model
{
    protected $table = 'transforms';
    protected $primaryKey = 'id_transforms';
    protected $fillable = [
        'user_id','KT_1', 'KT_2', 'KT_3', 'KT_4', 'KT_5', 'KT_6', 'KT_7', 'KT_8', 'PD_1', 'PD_2', 
        'PD_3', 'IPK_1', 'US_1', 'US_2', 'US_3', 'JK_1', 'FG_1', 'PL_1', 'BS_1'
    ];

}
