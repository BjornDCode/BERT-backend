<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Test;
use App\Transformers\ProjectTransformer;
use App\Transformers\PageTransformer;

class TestTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'project',
        'page'
    ];

    public function transform(Test $test)
    {
        return [
            'id' => $test->id,
            'version' => $test->version
        ];
    }

    public function includeProject(Test $test) {
        return $this->item($test->project, new ProjectTransformer);
    }

    public function includePage(Test $test) {
        return $this->item($test->page, new PageTransformer);
    }

}
