<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Order extends Model
{
    use SearchableTrait;

    protected $fillable = [
        'user_id','title','customer'
    ];
    protected $searchable = [
        'columns' => [
            'orders.title' => 10,
            'orders.customer' => 10,
            'orders.id'=>10,
        ],
        ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsToMany(Product::class,'orders-products','order_id','product_id');
    }

}
