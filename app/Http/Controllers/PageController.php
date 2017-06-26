<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePageFormRequest;
use App\Transformers\PageTransformer;
use App\Models\Project;
use App\Models\Page;
use App\Http\Requests\GetPagesFormRequest;

class PageController extends Controller
{

    public function index(GetPagesFormRequest $request) {

        $project = $request->user()->projects->find($request->project_id);

        if (!$project) {

            return response()->json([
                'error' => 'Could not fetch project'
            ], 403);

        }

        $pages = $request->user()->projects()->find($request->project_id)->pages;

        return fractal()
            ->collection($pages)
            ->transformWith(new PageTransformer)
            ->toArray();

    }

    public function show(Request $request) {

        $page = $request->user()->pages()->find($request->page);

        if (!$page) {

            return response()->json([
                'error' => 'Could not access page'
            ], 403);

        }

        return fractal()
            ->item($page)
            ->transformWith(new PageTransformer)
            ->toArray();

    }

    public function store(CreatePageFormRequest $request) {

        $project = $request->user()->projects->find($request->project_id);

        if (!$project) {

            return response()->json([
                'error' => 'Could not create project'
            ], 403);

        }

        $page = $request->user()->pages()->create([
            'title' => $request->json('title'),
            'url' => $request->json('url'),
            'project_id' => $request->json('project_id')
        ]);

        return fractal()
            ->item($page)
            ->transformWith(new PageTransformer)
            ->toArray();

    }

}
