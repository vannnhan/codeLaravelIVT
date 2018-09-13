<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //Khai báo bảng
    protected $table='customer';
    public $timestamps = true;
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

    function UserAssign() {
        return $this->hasOne(
                'App\User',
                'id',
                'user_assign'
            );
    }
}
