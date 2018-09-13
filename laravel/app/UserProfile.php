<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'address', 'phoneNumber',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
