<?php

namespace App\Http\Controllers\View;

use App\Models\Image;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\GuardarCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::orderby('updated_at', 'desc')->paginate(6);

        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Comment $comment)
    {
        return view('comment.show', compact('comment'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view ('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuardarCommentRequest $request, Comment $comment)
    {
        
        
        $comment->update($request->all());
        return back()->with('status', '<h1>Comentario actualizado</h1>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $images = Image::where('comment_id', $comment->id)->get();
        foreach ($images as $image) {
            $image->delete();
        }
        $comment->delete();
        return back()->with('status', '<h1>Comentario eliminado</h1>');
    }
}
