<?php

namespace App\Transformers;

use App\Models\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Project $project)
    {
        return [
            'id' => $project->id,
            'title' => $project->title,
            'diffForHumans' => $project->created_at->diffForHumans(),
        ];
    }
}
