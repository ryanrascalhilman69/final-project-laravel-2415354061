<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_profile_id',
        'package_name',
        'price',
        'start_date',
        'end_date',
        'status'
    ];

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }
}