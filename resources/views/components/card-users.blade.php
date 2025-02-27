


<div class="p-6 text-surface mb-4">
    <h5 class="mb-2 text-xl font-medium leading-tight">ID: {!! $user->id !!}</h5>
    <h3 class="mb-2 text-xl font-medium leading-tight">Nombre: {!! $user->name !!}</h3>
    <p class="mb-4 text-base">Apellidos: {!! $user->last_name !!}</p>
    <p class="mb-4 text-sm">Email: {!! $user->email !!}</p>
    <p class="mb-4 text-sm">Teléfono: {!! $user->phone !!}</p>
    <p class="mb-4 text-sm">Rol de usuario: {!! $user->role->name !!}</p>
    

    @if(!request()->routeIs('user.show'))
        <a href="{{route('user.show' , ['user' => $user->id])}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Mostrar</a>
    @endif  <a href="{{route('user.edit' , ['user' => $user->id ])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
    <form action="{{route('user.destroy' , ['user' => $user->id ])}}" method="POST" class="float-right">
       @method('DELETE')
       @csrf
       <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" >Borrar</button>
    </form>
</div>

