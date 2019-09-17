<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model
{
    protected $table = 'Endpoint';

    protected $fillable = [
        'nameId', 'name', 'unitId',
    ];

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unitId', 'unitId');
    }

    public function measures()
    {
        return $this->hasMany('App\Measure', 'nameId', 'nameId');
    }
}
