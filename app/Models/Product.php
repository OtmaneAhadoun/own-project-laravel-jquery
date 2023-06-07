<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use SoftDeletes,HasFactory;
    public function getRouteKeyName(){
        return 'slug';
    }
    protected $guarded=[];
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    public function brand()
    {
       return $this->belongsTo(Brand::class);
    }
    public function getPriceAttribute($value)
    {
        return $value."DH";
    }
    public function order_item()
    {
        return $this->hasOne(Order_item::class);
    }
}
