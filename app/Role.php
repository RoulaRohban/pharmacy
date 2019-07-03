<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\Traits\EntrustRoleTrait;

class Role extends EntrustRole
{
    use EntrustRoleTrait;

    protected $fillable = [
        'name',
        'display_name',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'pivot'
    ];
}
