<?php

namespace App\Http\Controllers\View;

use App\Models\User;
use App\Models\Image;
use App\Models\Space;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Service;
use App\Models\Modality;
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
        $spaces = Space::orderby('updated_at', 'desc')->paginate(6); // Muestra todos los espacios ordenados por fecha de actualización en orden descendente
        //$spaces = Space::pluck('id', 'name'); // Devuelve un array con los nombres de los espacios y su id
        //dd($spaces);

        return view ('space.index', compact('spaces'));
        


        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modalities = Modality::all();
        $services = Service::all();
        $spaceTypes = SpaceType::all();
        return view ('space.create', compact('modalities', 'services', 'spaceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarSpaceRequest $request)
    {

        $space = Space::create([
            'name' => $request->name,
            'regNumber' => $request->regNumber,
            'observation_CA' => $request->observation_CA,
            'observation_ES' => $request->observation_ES,
            'observation_EN' => $request->observation_EN,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'accessType' => strtolower($request->accessType),
            'totalScore'=> 0,
            'countScore'=> 0,
            'address_id' => Address::inRandomOrder()->first()->id,
            'space_type_id' => $request->spaceType,
            'user_id' => auth()->id(),
        ]);
            // Relación Many-to-Many con 'modalities'
            $space->modalities()->attach($request->modalities, [
                'created_at' => now(),
                'updated_at' => now()
            ]);
            

            // Relación Many-to-Many con 'services'
            $space->services()->attach($request->services, [
                'created_at' => now(),
                'updated_at' => now()
            ]);
            

        return redirect()->route('space.index')->with('status', '<h1>Espacio creado</h1>');
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
    {   $modalities = Modality::all();
        $services = Service::all();
        $spaceTypes = SpaceType::all();
        return view('space.edit', compact('space', 'modalities', 'services', 'spaceTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpaceRequest $request, Space $space)
    {
       

        // Actualizar relación Many-to-Many con 'modalities'
        $space->modalities()->sync($request->modalities, [
            'updated_at' => now()
        ]);

        // Actualizar relación Many-to-Many con 'services'
        $space->services()->sync($request->services, [
            'updated_at' => now()
        ]);

        $space->update($request->all());

        return back()->with('status', '<h1>Espacio actualizado</h1>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Space $space)
    {
        $comments = Comment::where('space_id', $space->id)->get(); //Recorre todas las imágenes de todos los comentarios y todos los comentarios del espacio y los va borrando
        foreach ($comments as $comment) {
            $images = Image::where('comment_id', $comment->id)->get();
            foreach ($images as $image) {
                $image->delete();
            }
            $comment->delete();
        }

        $space->services()->detach();
        $space->modalities()->detach();

        $space->delete();
        return view('space.index')->with('status', '<h1>Espacio eliminado</h1>');
    }
}
