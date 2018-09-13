<?php

namespace App\Model\Admin\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='city';
    public $timestamps = true;
}
