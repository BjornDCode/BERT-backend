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

        $project = $request->user()->projects()->find($request->project_id);

        if (!$project) {

            return response()->json([
                'error' => 'Could not fetch project'
            ], 403);

        }

        $pages = $project->pages()->latest('updated_at')->get();

        return fractal()
            ->collection($pages)
            ->transformWith(new PageTransformer)
            ->toArray();

    }

    public function show(Request $request, Page $page) {

        if ($request->user()->id !== $page->project->user_id){

            return response()->json([
                'error' => 'Could not access page'
            ], 403);

        }

        return fractal()
            ->item($page)
            ->includeTests()
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

        $page = $project->pages()->create([
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
