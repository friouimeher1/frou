<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
        protected $fillable = ['commercant_id','title','start_date','end_date'];
}
