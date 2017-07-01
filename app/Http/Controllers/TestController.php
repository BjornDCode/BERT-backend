<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTestFormRequest;
use App\Http\Requests\GetTestsFormRequest;
use App\Transformers\TestTransformer;
use App\Models\Test;

class TestController extends Controller
{

    public function index(GetTestsFormRequest $request) {

        $project = $request->user()->projects()->find($request->project_id);

        if (!$project) {

            return response()->json([
                'error' => 'Could not fetch test'
            ], 403);

        }

        $tests = $request->page_id ? $project->tests->where('page_id', $request->page_id) : $project->tests ;

        return fractal()
            ->collection($tests)
            ->transformWith(new TestTransformer)
            ->toArray();

    }

    public function show(Request $request, Test $test) {

        if ($request->user()->id !== $test->project->user_id) {

            return response()->json([
                'error' => 'Could not access test'
            ], 403);

        }

        return fractal()
            ->item($test)
            ->includeComparisons()
            ->includeResponses()
            ->transformWith(new TestTransformer)
            ->toArray();

    }

    public function store(CreateTestFormRequest $request) {

        $project = $request->user()->projects()->find($request->project_id);

        if (!$project) {

            return response()->json([
                'error' => 'Could not create test'
            ], 403);

        }

        $version = $request->page_id ? $project->tests()->where('page_id', '=', $request->page_id)->max('version') : $project->tests()->whereNull('page_id')->max('version') ;

        $test = $project->tests()->create([
            'page_id' => $request->json('page_id'),
            'version' => ++$version,
        ]);

        return fractal()
            ->item($test)
            ->transformWith(new TestTransformer)
            ->toArray();

    }

}
