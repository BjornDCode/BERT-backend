<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Page;
use App\Models\Comparison;

class Test extends Model
{

    protected $fillable = [
        'project_id',
        'page_id',
        'version'
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function page() {
        return $this->belongsTo(Page::class);
    }

    public function comparisons() {
        return $this->hasMany(Comparison::class);
    }

}
