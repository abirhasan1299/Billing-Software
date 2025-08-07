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
        return $this->hasOne(Student::class,'id','student_id');
    }
    public function agencies()
    {
        return $this->hasOne(Agency::class,'id','agency_id');
    }
}
