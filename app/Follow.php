<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['follow_id'];
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
