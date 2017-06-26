<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Response;

class ResponseTransformer extends TransformerAbstract
{

    public function transform(Response $response)
    {
        return [
            'id' => $response->id,
            'answer' => $response->answer
        ];
    }


}
