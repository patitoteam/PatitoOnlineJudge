<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wa_info extends Model
{
       protected $table = 'wa_info';
	 protected $fillable = ['solution_id','error'];
}
