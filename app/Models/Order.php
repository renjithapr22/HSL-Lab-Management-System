<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['provider_id', 'order_number', 'total_amount', 'status'];

    public function provider() {
        return $this->belongsTo(Provider::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
