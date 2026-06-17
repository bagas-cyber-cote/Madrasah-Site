<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginUser extends Model
{
    protected $table = 'login_users';

    protected $fillable = [
        'username',
        'password',
    ];
}
