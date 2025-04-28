<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'dob', 'contact_number', 'address', 'medical_history'];

    public function dispatches()
    {
        return $this->hasMany(Dispatch::class);
    }
}

