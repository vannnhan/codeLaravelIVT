<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractaction extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //Khai báo bảng
    protected $table='contract_action';
    public $timestamps = true;

    function Contract() {
        return $this->hasOne(
            'App\Model\Admin\Contract',
            'id',
            'contract'
        )->orderBy('id', 'DESC');
    }
}
