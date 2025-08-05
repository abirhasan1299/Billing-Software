<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $table = 'agencies';
    protected $fillable = [
        'name' ,
        'type',
        'status' ,
        'contact_person',
        'contact_email',
        'contact_phone',
        'address',
        'country' ,
        'state',
        'city' ,
        'postal_code',
        'bank_details',
        'payment_term',
        'fee_per_student',
        'total_amount',
        'notes'
    ];
}
