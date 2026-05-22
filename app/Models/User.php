<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}