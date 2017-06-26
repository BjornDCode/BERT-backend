<?php

namespace App\Transformers;

use App\Models\Project;
use App\Transformers\PageTransformer;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'pages'
    ];

    public function transform(Project $project)
    {
        return [
            'id' => $project->id,
            'title' => $project->title,
            'diffForHumans' => $project->created_at->diffForHumans(),
        ];
    }

    public function includePages(Project $project) {
        return $this->collection($project->pages, new PageTransformer);
    }

}
