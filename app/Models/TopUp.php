<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_user_name',
        'user_id',
        'nominal',
        'status',
        'nomor',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
