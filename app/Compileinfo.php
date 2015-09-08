<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compileinfo extends Model
{
    protected $table = 'compileinfo';
	 protected $fillable = ['solution_id','error','status','source_code'];
     protected $hidden = ['source_code'];
}
