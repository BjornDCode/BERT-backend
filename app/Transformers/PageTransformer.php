<?php

namespace App\Transformers;

use App\Models\Page;
use App\Transformers\ProjectTransformer;
use App\Transformers\TestTransformer;
use League\Fractal\TransformerAbstract;

class PageTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'project',
        'tests'
    ];

    public function transform(Page $page)
    {
        return [
            'id' => $page->id,
            'title' => $page->title,
            'url' => $page->url,
            'diffForHumans' => $page->created_at->diffForHumans(),
        ];
    }

    public function includeProject(Page $page) {
        return $this->item($page->project, new ProjectTransformer);
    }

    public function includeTests(Page $page) {
        return $this->collection($page->tests, new TestTransformer);
    }

}
