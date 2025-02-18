<?php

namespace App\Http\Controllers\View;

use App\Models\User;
use App\Models\Space;
use App\Models\Address;
use App\Models\SpaceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\UpdateSpaceRequest;
use App\Http\Requests\Backoffice\GuardarSpaceRequest;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $spaces = Space::all();  
        //$spaces = Space::find([1,3]);
        //$spaces = Space::where('accessType', 'n')->get(); // Where accessType n
        //$spaces = Space::where('accessType','n')->where('id','>',2)->first(); // Where (posted = not) AND (id > 2); 
        //$spaces = Space::where('accessType','n')->where('id','>',2)->get();
        $spaces = Space::orderBy('updated_at', 'desc')->get(); //Muestra todos los espacios ordenados por fecha de actualización
        //$spaces = Space::pluck('id', 'name'); // Devuelve un array con los nombres de los espacios y su id
        //dd($spaces);

        return view ('space.index', compact('spaces'));
        


        
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
            'name' => $request->name,
            'regNumber' => $request->regNumber,
            'observation_CA' => $request->observation_CA,
            'observation_ES' => $request->observation_ES,
            'observation_EN' => $request->observation_EN,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'accessType' => strtolower($request->accesstype),
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
    public function show(Space $space)
    {
        //$space = Space::find($id);
        //$space = Space::findorfail($id);

        return view('space.show', compact('space'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Space $space)
    {
        return view('space.edit', compact('space'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpaceRequest $request, Space $space)
    {
        $space->update($request->all());
        return back();
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
