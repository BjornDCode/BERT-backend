<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;

class Page extends Model
{

    protected $fillable = [
        'user_id',
        'project_id',
        'title',
        'url'
    ];


    public function project() {
        return $this->belongsTo(Project::class);
    }

}
