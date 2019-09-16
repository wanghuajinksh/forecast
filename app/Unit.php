<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'Unit';

    protected $fillable = [
        'unitId', 'name'
    ];

    public function endpoints()
    {
        return hasMany('App\Endpoint', 'unitId', 'unitId');
    }
}
