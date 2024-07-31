<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'brand_id',
        'image',
        'description',
        'quantity'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function carts():BelongsToMany{
        return $this->belongsToMany(Cart::class, 'car_product')->withPivot('quantity');
    }

    public function bills():BelongsToMany{
        return $this->belongsToMany(Bill::class, 'bill_product')->withPivot('quantity','subtotal');
    }

}
