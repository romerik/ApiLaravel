<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Assurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ApiResource;

class AssuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assurances = Assurance::all();
        return response([ 'assurances' => ApiResource::collection($assurances), 'message' => 'Assurances Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'responsable' => 'required|max:255',
            'contacts' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $assurance = Assurance::create($data);

        return response(['assurance' => new ApiResource($assurance), 'message' => 'Assurance Created successfully'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assurance  $assurance
     * @return \Illuminate\Http\Response
     */
    public function show(Assurance $assurance)
    {
        return response(['assurance' => new ApiResource($assurance), 'message' => 'Assurance Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assurance  $assurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assurance $assurance)
    {
        $assurance->update($request->all());

        return response(['assurance' => new ApiResource($assurance), 'message' => 'Assurance Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assurance  $assurance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assurance $assurance)
    {
        $assurance->delete();

        return response(['message' => 'Assurance Deleted']);
  
    }
}
