<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    //
    protected $table = 'users';

    protected $hidden = [
        'password', 'remember_token',
    ];
}
