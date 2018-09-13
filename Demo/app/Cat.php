<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model
{
	use SoftDeletes;

    protected $fillable = ['name','date_of_birth','breed_id','user_id'];

    protected $dates = ['delete_at'];

    public function breed(){
		return $this->belongsTo('App\Breed');
	}
}
