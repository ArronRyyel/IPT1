<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name', 'age', 'gender', 'address', 'contact_number', 'medical_history'];
}
