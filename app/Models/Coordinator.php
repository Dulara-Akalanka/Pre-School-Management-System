<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    use HasFactory;
    
    protected $table = 'coordinator_info';

    public static function boot()
    {
        parent::boot();
    
        self::creating(function ($table) {
            $lastRecord = self::orderBy('c_id', 'desc')->first();
            $lastId = $lastRecord ? substr($lastRecord->c_id, 5) : 0;
            $incrementedId = str_pad((int)$lastId + 1, 7, '0', STR_PAD_LEFT);
            $table->c_id = 'ALFC-' . $incrementedId;
        });
       
    }

    protected $fillable = [
        'c_id',	
        'c_name',	
        'c_address',	
        'gender',
        'email',
        'phone',
        'status',	
        'dob',	
        'doa',
        'image_name',
        'delete_status'
    ];
}
