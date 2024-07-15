<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telp',
        'member_number',
        'points',
        'user_id',
        'qr_code',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
