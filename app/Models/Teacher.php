<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher_info';

    public static function boot()
    {
        parent::boot();
    
        self::creating(function ($table) {
            $lastRecord = self::orderBy('t_id', 'desc')->first();
            $lastId = $lastRecord ? substr($lastRecord->t_id, 5) : 0;
            $incrementedId = str_pad((int)$lastId + 1, 7, '0', STR_PAD_LEFT);
            $table->t_id = 'ALFT-' . $incrementedId;
        });
       
    }

    protected $fillable = [
        't_id',	
        // 'barcode',
        't_name',	
        't_address',	
        'gender',
        'phone',
        'email',
        'status',	
        'dob',	
        'doa',
        'dot',	
        'image_name',
        't_level',
        'delete_status',
        'nic',
        'husband_name',
        'carrier',
        'educational_qualification',
        'other_qualification'
    ];
}
