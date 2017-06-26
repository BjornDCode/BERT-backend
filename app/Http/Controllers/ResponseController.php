<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateResponseFormRequest;
use App\Models\Comparison;
use App\Models\Response;
use App\Transformers\ResponseTransformer;
use App\Http\Requests\GetResponsesFormRequest;

class ResponseController extends Controller
{

    public function index(GetResponsesFormRequest $request) {

        $comparison = Comparison::find($request->comparison_id);

        if ($request->user()->id !== $comparison->test->project->user->id) {

            return response()->json([
                'error' => 'Could not access responses'
            ], 403);

        }

        $responses = $comparison->responses;

        return fractal()
            ->collection($responses)
            ->transformWith(new ResponseTransformer)
            ->toArray();

    }

    public function show(Request $request, Response $response) {

        if ($request->user()->id !== $response->comparison->test->project->user_id) {

            return response()->json([
                'error' => 'Could not access response'
            ], 403);

        }

        return fractal()
            ->item($response)
            ->transformWith(new ResponseTransformer)
            ->toArray();

    }

    public function store(CreateResponseFormRequest $request) {

        $comparison = Comparison::find($request->comparison_id);

        if (!$comparison) {

            return response()->json([
                'error' => 'Could not find questions'
            ], 401);

        }

        if ($request->answer < 1 || $request->answer > $comparison->scale) {
            return response()->json([
                'error' => 'Answer not within range'
            ], 400);
        }

        $response = $comparison->responses()->create([
            'answer' => $request->json('answer')
        ]);

        return fractal()
            ->item($response)
            ->transformWith(new ResponseTransformer)
            ->toArray();

    }

}
