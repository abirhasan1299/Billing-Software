<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function students()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function agencies()
    {
        return $this->belongsTo(Agency::class,'agency_id','id');
    }
    public function transaction()
    {
        return $this->hasMany(Transaction::class,'id','invoice_id');
    }
}
