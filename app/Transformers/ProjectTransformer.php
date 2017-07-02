<?php

namespace App\Transformers;

use App\Models\Project;
use App\Transformers\PageTransformer;
use App\Transformers\TestTransformer;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'pages',
        'tests'
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
        return $this->collection($project->pages()->latest('updated_at')->get(), new PageTransformer);
    }

    public function includeTests(Project $project) {
        return $this->collection($project->tests()->latest('updated_at')->get(), new TestTransformer);
    }

}
