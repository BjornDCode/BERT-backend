<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;
use App\Models\Test;

class Page extends Model
{

    protected $fillable = [
        'project_id',
        'title',
        'url'
    ];


    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }

}
