<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateComparisonFormRequest;
use App\Http\Requests\GetComparisonsFormRequest;
use App\Models\Test;
use App\Models\Comparison;
use App\Transformers\ComparisonTransformer;

class ComparisonController extends Controller
{

    public function index(GetComparisonsFormRequest $request) {

        $test = Test::find($request->test_id);

        if ($request->user()->id !== $test->project->user->id) {

            return response()->json([
                'error' => 'Could not access comparisons'
            ], 403);

        }

        $comparisons = $test->comparisons;

        return fractal()
            ->collection($comparisons)
            ->transformWith(new ComparisonTransformer)
            ->toArray();

    }

    public function show(Request $request, Comparison $comparison) {

        if ($request->user()->id !== $comparison->test->project->user_id) {

            return response()->json([
                'error' => 'Could not access comparison'
            ], 403);

        }

        return fractal()
            ->item($comparison)
            ->transformWith(new ComparisonTransformer)
            ->toArray();

    }

    public function store(CreateComparisonFormRequest $request) {

        $test = Test::find($request->test_id);

        if ($request->user()->id !== $test->project->user->id) {

            return response()->json([
                'error' => 'Could not create comparison'
            ], 403);

        }

        $comparison = $test->comparisons()->create([
            'from' => $request->json('from'),
            'to' => $request->json('to'),
            'scale' => $request->json('scale')
        ]);

        return fractal()
            ->item($comparison)
            ->transformWith(new ComparisonTransformer)
            ->toArray();

    }

}
