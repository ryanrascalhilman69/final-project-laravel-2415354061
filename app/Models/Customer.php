<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    // Pastikan fillable mencakup semua kolom ini
    protected $fillable = ['customer_id', 'name', 'email', 'phone', 'address', 'status'];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    /**
     * RELASI UTAMA: Hubungan ke tabel Subscriptions
     * Sesuai rancangan database, satu customer bisa punya banyak subscription
     */
    public function subscriptions(): HasMany
    {
        // Parameter kedua adalah nama foreign key di tabel subscriptions
        // Parameter ketiga adalah local key di tabel customers
        return $this->hasMany(Subscription::class, 'customer_id', 'id');
    }
}