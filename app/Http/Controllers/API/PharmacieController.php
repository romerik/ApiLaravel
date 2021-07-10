<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ApiResource;

class PharmacieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = Pharmacie::all();
        return response([ 'pharmacies' => ApiResource::collection($pharmacies), 'message' => 'Pharmacies Retrieved successfully'], 200);
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

        $pharmacie = Pharmacie::create($data);

        return response(['pharmacie' => new ApiResource($pharmacie), 'message' => 'Pharmacie Created successfully'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacie  $pharmacie
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacie $pharmacie)
    {
        return response(['pharmacie' => new ApiResource($pharmacie), 'message' => 'Pharmacie Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pharmacie  $pharmacie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacie $pharmacie)
    {
        $pharmacie->update($request->all());

        return response(['pharmacie' => new ApiResource($pharmacie), 'message' => 'Pharmacie Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacie  $pharmacie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacie $pharmacie)
    {
        $pharmacie->delete();

        return response(['message' => 'Pharmacie Deleted']);
    }
}
