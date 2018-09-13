<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Admin\Contract;

class Company extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //Khai báo bảng
    protected $table='company';
    public $timestamps = true;
    function Customer() {
        return $this->hasMany(
            'App\Model\Admin\Customer',
            'co_id',
            'id'
        );
    }

    function City() {
        return $this->hasOne(
            'App\Model\Admin\Setting\City',
            'id',
            'co_localtion'
        );
    }

    function Type() {
        return $this->hasOne(
            'App\Model\Admin\Setting\CoType',
            'id',
            'co_type'
        );
    }

    function UserAssign() {
        return $this->hasOne(
            'App\User',
            'id',
            'user_assign'
        ); 
    }

    function UserCreated() {
        return $this->hasOne(
            'App\User',
            'id',
            'user_created'
        ); 
    }
    
    function Contract() {
        return $this->hasMany(
            'App\Model\Admin\Contract',
            'co_id',
            'id'
        );
    }

    // function Contracttype() {
    //     return $this->belongsToMany(
    //         'App\Model\Admin\Setting\Contracttype',
    //         'contract',
    //         'co_id',
    //         'type'
    //     );
    // }

    
}
