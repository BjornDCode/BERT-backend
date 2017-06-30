<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\CreateProjectFormRequest;
use App\Transformers\ProjectTransformer;

class ProjectController extends Controller
{

    public function index(Request $request) {

        $projects = $request->user()->projects;

        return fractal()
            ->collection($projects)
            ->transformWith(new ProjectTransformer)
            ->toArray();

    }

    public function show(Project $project, Request $request) {

        if ($project->user_id !== $request->user()->id) {

            return response()->json([
                'error' => 'Could not access data'
            ], 403);

        }

        return fractal()
            ->item($project)
            ->includeTests()
            ->includePages()
            ->transformWith(new ProjectTransformer)
            ->toArray();

    }

    public function store(CreateProjectFormRequest $request) {

        $project = $request->user()->projects()->create([
            'title' => $request->json('title'),
        ]);

        return fractal()
            ->item($project)
            ->transformWith(new ProjectTransformer)
            ->toArray();

    }

}
