<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //Khai báo bảng
    protected $table='contract';
    public $timestamps = true;

    function Contracttype() {
        return $this->belongsTo(
            'App\Model\Admin\Setting\Contracttype',
            'type'
        );
    }

    function Company() {
        return $this->hasOne(
            'App\Model\Admin\Company',
            'id',
            'co_id'
        );
    }

    function UserCreated() {
        return $this->hasOne(
            'App\User',
            'id',
            'user_created'
        );
    }

    function UserWork() {
        return $this->hasOne(
            'App\User',
            'id',
            'user_work'
        );
    }

    function ContractAction() {
        return $this->hasMany(
            'App\Model\Admin\Contractaction',
            'contract',
            'id'
        )->orderBy('id', 'DESC');
    }

    function ContractStatus() {
        return $this->hasOne(
            'App\Model\Admin\Setting\Contractstatus',
            'id',
            'status'
        );
    }
}
