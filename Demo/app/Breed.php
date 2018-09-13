<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{

	protected $fillable = ['name'];

    public function cats(){
		return $this->hasMany('App\Cat');
	}
}
