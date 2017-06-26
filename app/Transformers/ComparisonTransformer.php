<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Comparison;
use App\Transformers\ResponseTransformer;

class ComparisonTransformer extends TransformerAbstract
{

    protected $availableIncludes = [
        'responses'
    ];

    public function transform(Comparison $comparison)
    {
        return [
            'id' => $comparison->id,
            'from' => $comparison->from,
            'to' => $comparison->to,
            'scale' => $comparison->scale
        ];
    }

    public function includeResponses(Comparison $comparison) {
        return $this->collection($comparison->responses, new ResponseTransformer);
    }

}
