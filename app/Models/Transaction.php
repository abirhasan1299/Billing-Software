<?php

namespace App\Models;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student()
    {
        return $this->hasOne(Student::class,'id','student_id');
    }
    public function agency()
    {
        return $this->hasOne(Agency::class,'id','agency_id');
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class,'id','invoice_id');
    }
}
