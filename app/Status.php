<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
      protected $table = 'solution';
	 protected $fillable = ['solution_id', 'problem_id', 'user_id','time','memory','in_date','result','language','contest_id','ip','valid','num','code_length','judgetime','pass_rate','created_at','updated_at'];
     protected $hidden = ['contest_id'];
}
