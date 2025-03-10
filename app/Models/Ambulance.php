<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;

    protected $fillable = ['license_plate', 'model', 'status', 'location', 'assigned_to'];

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function dispatches()
    {
        return $this->hasMany(Dispatch::class);
    }
}
