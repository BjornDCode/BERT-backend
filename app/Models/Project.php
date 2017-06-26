<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Page;
use App\Models\Test;

class Project extends Model
{

    protected $fillable = [
        'title'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pages() {
        return $this->hasMany(Page::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }

}
