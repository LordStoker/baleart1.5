<?php

namespace App\Http\Controllers\View;

use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\GuardarUserRequest;
use App\Http\Requests\Backoffice\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role_id', 3)->orderby('updated_at', 'desc')->paginate(6);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuardarUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => Role::where('name', 'Visitante')->first()->id,
        ]);

        return redirect()->route('user.index')->with('status', '<h1>Usuario creado con éxito</h1>');

    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.index')->with('status', '<h1>Usuario actualizado con éxito</h1>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $comments = Comment::where('user_id', $user->id)->get();
        foreach ($comments as $comment) {
            $images = Image::where('comment_id', $comment->id)->get();
            foreach ($images as $image) {
                $image->delete();
            }
            $comment->delete();
        }
        $user->delete();
        return redirect()->route('user.index')->with('status', '<h1>Usuario eliminado con éxito</h1>');
    }
}
