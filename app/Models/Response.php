<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comparison;
use App\Models\Test;

class Response extends Model
{

    protected $fillable = [
        'comparison_id',
        'answer'
    ];

    public function comparison() {
        return $this->belongsTo(Comparison::class);
    }

    public function test() {
        return $this->belongsTo(Test::class);
    }

}
