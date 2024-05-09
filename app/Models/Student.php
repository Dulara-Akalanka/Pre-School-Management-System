<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student_info';

    public static function boot()
    {
        parent::boot();
    
        self::creating(function ($table) {
            $lastRecord = self::orderBy('s_id', 'desc')->first();
            $lastId = $lastRecord ? substr($lastRecord->s_id, 5) : 0;
            $incrementedId = str_pad((int)$lastId + 1, 10, '0', STR_PAD_LEFT);
            $table->s_id = 'ALFS-' . $incrementedId;
        });
       
    }
    

    protected $fillable = [
        's_id',	
        // 'barcode',
        's_name',	
        'religion',
        'father_name',	
        'mother_name',	
        's_address',
        'phone',		
        'dob',
        'doa',
        'gender',
        'image_name',
        's_level',		
        'delete_status',
        'gardian_name',
        'dot',
        'transport'
    ];
    
}
