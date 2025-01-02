<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $primaryKey = 'driver_id'; // Menetapkan primary key

    protected $fillable = [
        'driver_name',
        'phone',
        'license_number',
        'image_url',
    ];

    // Relasi: Seorang Driver bisa mengemudikan banyak Vehicle
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'driver_id');
    }

    // Relasi: Seorang Driver bisa memiliki banyak Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'driver_name');
    }
}
