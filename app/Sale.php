<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'created_at',
    ];

    public function drugs()
    {
        return $this->belongsToMany('App\Drug', 'sales_drugs')->withPivot('amount');
    }
     public function provider()
    {
        return $this->belongsTo(User::class);
    }
}
