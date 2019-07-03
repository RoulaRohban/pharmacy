<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profit extends Model
{
    protected $fillable = [
        'drugprofit',
        'created_at',
    ];
     protected $table = 'profits';
    public function Drug()
    {
        return $this->belongsTo(Drug::class);
    }
    public function sale()
    {
        return $this->belongsTo(SaleDrug::class);
    }

}
