


    <div class="p-6 text-surface mb-4">
        <h5 class="mb-2 text-xl font-medium leading-tight">ID: {!! $space->id !!}</h5>
        <h3 class="mb-2 text-xl font-medium leading-tight">Nombre: {!! $space->name !!}</h3>
        <p class="mb-4 text-base">Nº Registro: {!! $space->regNumber !!}</p>
        <p class="mb-4 text-sm">Descripción_CA: {!! $space->observation_CA !!}</p>
        <p class="mb-4 text-sm">Descripción_ES: {!! $space->observation_ES !!}</p>
        <p class="mb-4 text-sm">Descripción_EN: {!! $space->observation_EN !!}</p>
        <p class="mb-4 text-sm">Email: {!! $space->email !!}</p>
        <p class="mb-4 text-sm">Teléfono: {!! $space->phone !!}</p>
        <p class="mb-4 text-sm">Website: {!! $space->website !!}</p>
        <p class="mb-4 text-sm">Puntuación: {!! $space->totalScore !!}</p>
        <p class="mb-4 text-sm">Dirección: {!! $space->address->name !!}</p>
        <p class="mb-4 text-sm">Tipo de espacio: {!! $space->space_type->name !!}</p>
        <p class="mb-4 text-sm">Gestor: {!! $space->user->name !!}</p>
        <p class="mb-4 text-sm">Modalidades: @foreach($space->modalities as $modality) {!! $modality->name !!} @endforeach</p>
        <p class="mb-4 text-sm">Servicios: @foreach($space->services as $service) {!! $service->name !!} @endforeach</p>
        <p class="mb-4 text-sm">Acceso minusválidos: {!! $space->accessType !!}</p>
        <p class="mb-4 text-sm">Fecha creación: {!! $space->created_at !!}</p>
        <p class="mb-4 text-sm">Fecha modificación: {!! $space->updated_at !!}</p>

        @if(!request()->routeIs('space.show'))
            <a href="{{route('space.show' , ['space' => $space->id])}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Mostrar</a>
        @endif  <a href="{{route('space.edit' , ['space' => $space->id ])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
        <form action="{{route('space.destroy' , ['space' => $space->id ])}}" method="POST" class="float-right">
           @method('DELETE')
           @csrf
           <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" >Borrar</button>
        </form>
    </div>

