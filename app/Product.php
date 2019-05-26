<?php

namespace App;

use App\Seller;
use App\Category;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    protected $fillable = ['name','description','quantity','status','image','seller_id'];

    public function isAvailable()
    {
        return $this->status == self::AVAILABLE_PRODUCT;
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function($product){
            if($product->quantity == 0 && $product->isAvailable()){
                $product->status = self::UNAVAILABLE_PRODUCT;
                $product->save();
            }
        });
    }
}
