<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDrug extends Model
{
    protected $fillable = [
        'drug_id',
        'sale_id',
        'amount',
    ];

    protected $table = 'sales_drugs';
   public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}
