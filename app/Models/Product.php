<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['manufacturer_id', 'name', 'sku', 'price', 'stock'];

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
