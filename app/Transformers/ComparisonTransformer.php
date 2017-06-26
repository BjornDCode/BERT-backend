<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Comparison;

class ComparisonTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Comparison $comparison)
    {
        return [
            'id' => $comparison->id,
            'from' => $comparison->from,
            'to' => $comparison->to,
            'scale' => $comparison->scale
        ];
    }
}
