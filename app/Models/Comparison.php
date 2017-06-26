<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Test;

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

}
