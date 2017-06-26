<?php

namespace App\Transformers;

use App\Models\Page;
use League\Fractal\TransformerAbstract;

class PageTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Page $page)
    {
        return [
            'id' => $page->id,
            'title' => $page->title,
            'url' => $page->url,
            'diffForHumans' => $page->created_at->diffForHumans(),
        ];
    }
}
