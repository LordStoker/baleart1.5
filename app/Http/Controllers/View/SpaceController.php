<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view ('spaces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "estoy en function store() de SpaceController";
        
        echo 'nombre = '.$request->input('nombre').'<br>';
        echo 'nombre = '.$request->nombre.'<br>';
        echo 'nombre = '.request('nombre'); 
 
        dd($request); // Desgrana el $request y lo pinta en pantalla
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
