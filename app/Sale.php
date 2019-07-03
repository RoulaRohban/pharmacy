<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'created_at',
        'customer_id',
    ];
   protected $table = 'sales';
    public function drugs()
    {
        return $this->belongsToMany('App\Drug', 'sales_drugs')->withPivot('amount');
    }
     public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
