<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $primaryKey = 'log_id'; // Menetapkan primary key

    protected $fillable = [
        'user_id',
        'action',
        'description',
    ];

    // Relasi: Sebuah Log terkait dengan satu User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
