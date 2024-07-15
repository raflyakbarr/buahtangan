<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Member;

class RiwayatPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_number',
        'user_id',
        'points',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
