<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'ambulance_id', 'location'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function ambulance()
    {
        return $this->belongsTo(Ambulance::class);
    }
}

