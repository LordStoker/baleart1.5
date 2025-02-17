<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackOffice\GuardarService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarService $request)
    {
        echo "estoy en function store() de ServiceController";

        echo 'nombre = '.$request->input('name').'<br>';
        echo 'nombre = '.$request->name.'<br>';
        echo 'nombre = '.request('name');
        // $request->validate([
        //     'name' => 'required|unique:spaces|min:5|max:255',
        // ]);
        
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
