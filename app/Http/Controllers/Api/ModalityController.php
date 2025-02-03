<?php

namespace App\Http\Controllers\Api;

use App\Models\Modality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModalityResource;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modalities = Modality::all();

        return (ModalityResource::collection($modalities));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
