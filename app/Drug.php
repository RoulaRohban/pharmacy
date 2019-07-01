<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Drug extends Model
{
    protected $fillable = [
        'title',
        'provider_id',
        'category_id',
        'measure',
        'price',
        'balance',
        'ExpiredDate',
        'OrginalPrice',
        'PurchaseDate',
        'limitQTY',
    ];
    protected $table = 'drugs';

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sales()
    {
        return $this->hasMany(SaleDrug::class);
    }

    public function getFormattedPrice()
    {
        return number_format($this->price, 2, '.', ' ').' SP';
    }
    public function getFormattedorginalPrice()
    {
        return number_format($this->OrginalPrice, 2, '.', ' ').' SP';
    }

    public function scopeExpired($query)
    {
        $query->where('ExpiredDate', '<=', Carbon::now()->toDateTimeString());
    }

    // public function scopeShort($query)
    // {
    //     $query->where('limitQTY', '<=', $this->balance);
    // }
}
