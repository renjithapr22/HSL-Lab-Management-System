<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'plan_name', 'start_date', 'expiry_date', 'status'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
