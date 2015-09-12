<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source_code extends Model
{
    protected $table = 'source_code';
	 protected $fillable = ['solution_id','sourcecode_id','source'];
}
