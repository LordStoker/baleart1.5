


<div class="p-6 text-surface mb-4">
    <h5 class="mb-2 text-xl font-medium leading-tight">ID: {!! $comment->id !!}</h5>
    <h3 class="mb-2 text-xl font-medium leading-tight">Comentario: {!! $comment->comment !!}</h3>
    <p class="mb-4 text-base">Puntuación: {!! $comment->score !!}</p>
    <p class="mb-4 text-sm">Publicado: {!! $comment->status !!}</p>
    <p class="mb-4 text-sm">Espacio del comentario: {!! $comment->space->name !!}</p>
    <p class="mb-4 text-sm">Autor: {!! $comment->user->name !!}</p>

    

    @if(!request()->routeIs('comment.show'))
        <a href="{{route('comment.show' , ['comment' => $comment->id])}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Mostrar</a>
    @endif  <a href="{{route('comment.edit' , ['comment' => $comment->id ])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>

</div>

