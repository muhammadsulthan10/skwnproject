<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'user_id'; // Menetapkan primary key

    protected $fillable = [
        'username',
        'password',
        'role',
        'position',
        'image_url'
    ];

    protected $hidden = [
        'password', // Agar password tidak muncul saat mengambil data user
    ];

    // Relasi: Seorang User bisa memiliki banyak log
    public function logs()
    {
        return $this->hasMany(Log::class, 'user_id');
    }

    // Relasi: Seorang User bisa membuat banyak Booking
    public function bookingsCreated()
    {
        return $this->hasMany(Booking::class, 'created_by_name');
    }

    // Relasi: Seorang User bisa menyetujui banyak Booking (Level 1)
    public function bookingsApprovedLevel1()
    {
        return $this->hasMany(Booking::class, 'approved_by_level1_name');
    }

    // Relasi: Seorang User bisa menyetujui banyak Booking (Level 2)
    public function bookingsApprovedLevel2()
    {
        return $this->hasMany(Booking::class, 'approved_by_level2_name');
    }
}
