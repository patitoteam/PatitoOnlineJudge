<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    protected $table = 'run';
	 protected $fillable = ['run_id','solution_id','sourcecode_id','problem_id','language'];
}
