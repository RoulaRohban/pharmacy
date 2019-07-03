<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
	 protected $table = 'providers';
    public function drugs()
    {
        return $this->hasMany(Drug::class);
    }
}
