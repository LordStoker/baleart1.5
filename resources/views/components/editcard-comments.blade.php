<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta comment="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comentario</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- @include('components.alert')  --}}
    <div class="py-12">
        @if (session('status'))
            <div id="status-message" class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{!! session('status') !!}</span>
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('status-message').style.display = 'none';
                }, 3000);
            </script>
        @endif
        <form action="{{ route('comment.update', ['comment' => $comment->id]) }}" method="post">
            @csrf <!-- Security Token --> <!-- Cambio de method a 'PUT', en caso contrario llamaría al show -->
            @method('PUT')
            <div class="mb-3">
                <label for="comment">Comentario</label>
                <textarea type="text" class="editor mt-1 block w-full rounded-lg" style="@error('comment') border-color:RED; @enderror" name="comment"> {{$comment->comment}}</textarea> 
                @error('comment')
                <div>{{$message}}</div><br />
                @enderror
            </div>  
        
            <div class="mb-3">
                <label for="score">Puntuación</label>
                <select type="text" class="mt-1 block w-full rounded-lg" style="@error('score') border-color:RED; @enderror" name="score">
                    <option value="1" {{ $comment->score == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $comment->score == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $comment->score == 3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $comment->score == 4 ? 'selected' : '' }}>4</option>
                    <option value="5" {{ $comment->score == 5 ? 'selected' : '' }}>5</option>
                </select>
                @error('score')
                <div>{{$message}}</div><br />
                @enderror   
            </div>
        
        
            <div class="mb-3">
                <label for="status">Publicado</label>
                <select class="mt-1 block w-full rounded-lg" style="@error('status') border-color:RED; @enderror" name="status">
                    <option value="y" {{ $comment->status == "y" ? 'selected' : '' }}>Sí</option>
                    <option value="n" {{ $comment->status == "n" ? 'selected' : '' }}>No</option>
                </select>
                @error('status')
                <div>{{$message}}</div><br />
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="space_id">Espacio del comentario </label>
                <input type="text" class="mt-1 block w-full rounded-lg" value="{{$comment->space->name}}" readonly />
                <input type="hidden" class="mt-1 block w-full rounded-lg" style="@error('space_id') border-color:RED; @enderror" name="space_id" value="{{$comment->space_id}}" />
                @error('space_id')
                <div>{{$message}}</div><br />
                @enderror
            </div>  

            <div class="mb-3">
                <label for="user_id">Autor </label>
                <input type="text" class="mt-1 block w-full rounded-lg" value="{{$comment->user->name}}" readonly />
                <input type="hidden" class="mt-1 block w-full rounded-lg" style="@error('user_id') border-color:RED; @enderror" name="user_id" value="{{$comment->user_id}}" />
                @error('user_id')
                <div>{{$message}}</div><br />
                @enderror
            </div>  
             
        
            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Actualizar" >
        </form>
    </body>
</html>
    