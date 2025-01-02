<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $primaryKey = 'vehicle_id'; // Menetapkan primary key

    protected $fillable = [
        'vehicle_name',
        'vehicle_type',
        'license_plate',
        'ownership',
        'service_schedule',
        'status',
        'fuel_consumption',
    ];

    // Relasi: Sebuah Vehicle bisa memiliki banyak Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'vehicle_name');
    }
}
