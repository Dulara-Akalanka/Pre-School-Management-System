<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;
    protected $table = 'user_login';

    protected $fillable = [
        'id',
        'username',
        'password',
        'user_id',
        'user_type'
    ];
}
