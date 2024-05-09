<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin_info';

    protected $fillable = [
        'a_id',	
        'a_name',	
        'a_address',
        'email',
        'phone',	
        'gender',	
        'status',
        'doa',	
        'dob'	
    ];
}
