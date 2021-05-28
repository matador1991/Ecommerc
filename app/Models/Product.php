<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Product extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'photo','status'
    ];
    public function order()
    {
        return $this->belongsToMany(Order::class,'orders-products','product_id','order_id');
    }

    public function status()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
