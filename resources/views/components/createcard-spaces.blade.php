<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Space</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- @dd($modalities, $services, $spaceTypes) --}}
<body>
    {{-- @include('components.alert')     --}}
    @if (session('status'))
    <div class="alert alert-primary role='alert'">
        {!!session('status') !!}
    </div>
@endif

<form action="{{ route('space.store') }}" method="post">
    @csrf <!-- Security Token --> <!-- Cambio de method a 'PUT', en caso contrario llamaría al show -->
    <div class="mb-3">
        <label for="name">Nombre</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('name') border-color:RED; @enderror" name="name" />
        @error('name')
        <div>{{$message}}</div><br />
        @enderror
    </div>  

    <div class="mb-3">
        <label for="regNumber">Nº Registro</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('regNumber') border-color:RED; @enderror" name="regNumber" />
        @error('regNumber')
        <div>{{$message}}</div><br />
        @enderror   
    </div>


    <div class="mb-3">
        <label for="observation_CA">Descripción_CA</label>
        <textarea  type="text" class="editor mt-1 block w-full rounded-lg" style="@error('observation_CA') border-color:RED; @enderror" name="observation_CA"></textarea>
        @error('observation_CA')
        <div>{{$message}}</div><br />
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="observation_ES">Descripción_ES</label>
        <textarea id="editor" type="text" class="editor mt-1 block w-full rounded-lg" style="@error('observation_ES') border-color:RED; @enderror" name="observation_ES"></textarea>
        @error('observation_ES')
        <div>{{$message}}</div><br />
        @enderror 
    </div> 

    <div class="mb-3">
        <label for="observation_EN">Descripción_EN</label>
        <textarea id="editor" type="text" class="editor mt-1 block w-full rounded-lg" style="@error('observation_EN') border-color:RED; @enderror" name="observation_EN"></textarea>
        @error('observation_EN')
        <div>{{$message}}</div><br />
        @enderror
    </div>

    <div class="mb-3">
        <label for="modalities">Modalidades (CTRL + Click para seleccionar varios)</label>
        <select name="modalities[]" class="mt-1 block w-full rounded-lg" multiple>
        @foreach ($modalities as $modality)
            <option value="{{$modality->id}}">{{$modality->description_ES}}</option>
        @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="services">Servicios (CTRL + Click para seleccionar varios)</label>
        <select name="services[]" class="mt-1 block w-full rounded-lg" multiple>
        @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->description_ES}}</option>
        @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="spaceType">Tipo de espacio</label>
        <select name="spaceType" class="mt-1 block w-full rounded-lg">
        @foreach ($spaceTypes as $spaceType)
            <option value="{{$spaceType->id}}">{{$spaceType->description_ES}}</option>
        @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="mt-1 block w-full rounded-lg" style="@error('email') border-color:RED; @enderror" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" />
        @error('email')
        <div>{{$message}}</div><br />
        @enderror
    </div>   

    <div class="mb-3">
        <label for="phone">Phone</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('phone') border-color:RED; @enderror" name="phone"  />
        @error('phone')
        <div>{{$message}}</div><br />
        @enderror   
    </div>
    <div class="mb-3">
        <label for="website">Website</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('website') border-color:RED; @enderror" name="website"/>
        @error('website')
        <div>{{$message}}</div>
        @enderror   
    </div>

    <div class="mb-3">
        <label for="accessType">Acceso para minusválidos</label>
        <select class="form-label rounded-lg" name="accessType"  />
            <option value="n" >No</option>
            <option value="y">Sí</option>
            <option value="p">Parcial</option>
        </select>
  
    </div>
     

    <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Crear" >
</form>
</body>
</html>