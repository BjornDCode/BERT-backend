<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Test;
use App\Models\Response;

class Comparison extends Model
{

    protected $fillable = [
        'test_id',
        'from',
        'to',
        'scale'
    ];

    public function test() {
        return $this->belongsTo(Test::class);
    }

    public function responses() {
        return $this->hasMany(Response::class);
    }

}
