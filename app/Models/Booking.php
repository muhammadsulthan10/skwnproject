<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_id'; // Menetapkan primary key

    protected $fillable = [
        'vehicle_name',
        'driver_name',
        'created_by',
        'level1',
        'position1',
        'level2',
        'position2',
        'status',
        'start_date',
        'end_date',
        'purpose',
    ];

    // Relasi: Sebuah Booking terkait dengan satu Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_name', 'vehicle_name');
    }

    // Relasi: Sebuah Booking terkait dengan satu Driver
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_name', 'driver_name');
    }

    // Relasi: Sebuah Booking dibuat oleh seorang User
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_name', 'username');
    }

    // Relasi: Sebuah Booking disetujui oleh seorang User (Level 1)
    public function approvedByLevel1()
    {
        return $this->belongsTo(User::class, 'approved_by_level1_name', 'username');
    }

    public function getApprovedByLevel1PositionAttribute()
    {
        return $this->approvedByLevel1 ? $this->approvedByLevel1->position : null;
    }

    // Relasi: Sebuah Booking disetujui oleh seorang User (Level 2)
    public function approvedByLevel2()
    {
        return $this->belongsTo(User::class, 'approved_by_level2_name', 'username');
    }

    public function getApprovedByLevel2PositionAttribute()
    {
        return $this->approvedByLevel2 ? $this->approvedByLevel2->position : null;
    }
}
