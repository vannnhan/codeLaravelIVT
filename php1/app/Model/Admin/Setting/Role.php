<?php

namespace App\Model\Admin\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='role';
    public $timestamps = false;

}
