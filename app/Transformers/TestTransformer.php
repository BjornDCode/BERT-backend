<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Test;
use App\Transformers\ProjectTransformer;
use App\Transformers\PageTransformer;
use App\Transformers\ComparisonTransformer;

class TestTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'project',
        'page',
        'comparisons'
    ];

    public function transform(Test $test)
    {
        return [
            'id' => $test->id,
            'version' => $test->version,
            'page' => $test->page
        ];
    }

    public function includeProject(Test $test) {
        return $this->item($test->project, new ProjectTransformer);
    }

    public function includePage(Test $test) {
        return $this->item($test->page, new PageTransformer);
    }

    public function includeComparisons(Test $test) {
        return $this->collection($test->comparisons, new ComparisonTransformer);
    }

}
