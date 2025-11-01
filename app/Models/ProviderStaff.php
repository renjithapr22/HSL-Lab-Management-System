<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderStaff extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'name',
        'role',
        'phone',
        'email',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
