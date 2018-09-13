<?php

namespace App\Model\Admin\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contracttype extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //Khai báo bảng
    protected $table='contract_type';
    public $timestamps = true;
    
    function Contract() {
        return $this->hasMany(
            'App\Model\Admin\Contract',
            'type',
            'id'
        );
    }

    function Form() {
        return $this->hasOne(
            'App\Model\Admin\Setting\Form',
            'id',
            'form'
        );
    }
}
