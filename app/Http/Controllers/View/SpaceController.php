<?php

namespace App\Http\Controllers\View;

use App\Models\Space;
use App\Models\Address;
use App\Models\SpaceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\GuardarSpaceRequest;
use App\Models\User;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ('Hola Mundo Cruel');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('space.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarSpaceRequest $request)
    {
        // echo "estoy en function store() de SpaceController";
        // echo 'nombre = '.$request->input('name').'<br>';
        // echo 'nombre = '.$request->name.'<br>';
        // echo 'nombre = '.request('name'); 
        Space::create([
            'name' => $request->nombre,
            'regNumber' => $request->regNumber,
            'observation_CA' => $request->descripcion_ca,
            'observation_ES' => $request->descripcion_es,
            'observation_EN' => $request->descripcion_en,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'accesstype' => strtolower($request->accesstype),
            'totalScore'=> 0,
            'countScore'=> 0,
            'address_id' => Address::inRandomOrder()->first()->id,
            'space_type_id' => SpaceType::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ]);

        return back();
        // $request->validate([
        //     'name' => 'required|unique:spaces|min:5|max:255',
        // ]);
 
        // dd($request); // Desgrana el $request y lo pinta en pantalla
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
