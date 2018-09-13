<?php

namespace App\Model\Admin\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractstatus extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //Khai báo bảng
    protected $table='contract_status';
    public $timestamps = true;

    function Contract() {
        return $this->hasMany(
            'App\Model\Admin\Contract',
            'status',
            'id'
        );
    }
}
