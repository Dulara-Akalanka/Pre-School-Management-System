<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;

    protected $table = 'student_payment';

    public static function boot()
    {
        parent::boot();
    
        self::creating(function ($table) {
            $lastRecord = self::orderBy('invoice_id', 'desc')->first();
            $lastId = $lastRecord ? substr($lastRecord->invoice_id, 5) : 0;
            $incrementedId = str_pad((int)$lastId + 1, 10, '0', STR_PAD_LEFT);
            $table->invoice_id = 'ALFI-' . $incrementedId;
        });
       
    }

    protected $fillable = [
        'invoice_id',
        'student_id',
        'student_name',
        'month',
        'amount',
        'payment_type'
    ];
}
