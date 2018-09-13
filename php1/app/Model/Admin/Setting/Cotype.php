<?php

namespace App\Model\Admin\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoType extends Model
{
    use SoftDeletes;
    protected $table='cotype';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
}
