<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $fillable= [
        'id',
        'source',
        'destination',
        'date',
        'airline_id',
        'aircraft_id'
    ];
    
    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }
}
