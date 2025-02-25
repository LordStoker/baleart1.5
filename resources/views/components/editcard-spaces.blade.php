<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Space</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('components.alert')    
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
    


<form action="{{ route('space.update', ['space' => $space->id]) }}" method="post">
    @csrf <!-- Security Token --> <!-- Cambio de method a 'PUT', en caso contrario llamaría al show -->
    @method('PUT') 
    <div class="mb-3">
        <label for="name">Nombre</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('name') border-color:RED; @enderror" name="name" value="{{$space->name}}" />
        @error('name')
        <div>{{$message}}</div><br />
        @enderror
    </div>  

    <div class="mb-3">
        <label for="regNumber">Nº Registro</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('regNumber') border-color:RED; @enderror" name="regNumber" value="{{$space->regNumber}}" readonly />
        @error('regNumber')
        <div>{{$message}}</div><br />
        @enderror   
    </div>


    <div class="mb-3">
        <label for="observation_CA">Descripción_CA</label>
        <textarea  type="text" class="editor mt-1 block w-full rounded-lg " style="@error('observation_CA') border-color:RED; @enderror" name="observation_CA">{!! $space->observation_CA !!}</textarea>
        @error('observation_CA')
        <div>{{$message}}</div><br />
        @enderror
    </div>

    
    <div class="mb-3">
        <label for="observation_ES">Descripción_ES</label>
        <textarea  type="text" class="editor mt-1 block w-full rounded-lg editor" style="@error('observation_ES') border-color:RED; @enderror" name="observation_ES">{!! $space->observation_ES !!}</textarea>
        @error('observation_ES')
        <div>{{$message}}</div><br />
        @enderror 
    </div> 

    <div class="mb-3">
        <label for="observation_EN">Descripción_EN</label>
        <textarea id="editor" type="text" class="mt-1 block w-full rounded-lg editor" style="@error('observation_EN') border-color:RED; @enderror" name="observation_EN">{!! $space->observation_EN !!}</textarea>
        @error('observation_EN')
        <div>{{$message}}</div><br />
        @enderror
    </div>

    <div class="mb-3">
        <label for="modalities">Modalidades (CTRL + Click para seleccionar varios)</label>
        <select name="modalities[]" class="mt-1 block w-full rounded-lg" multiple>
        @foreach ($modalities as $modality)
            <option value="{{$modality->id}}" {{ in_array($modality->id, $space->modalities->pluck('id')->toArray()) ? 'selected' : '' }}>{{$modality->description_ES}}</option>
        @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="services">Servicios (CTRL + Click para seleccionar varios)</label>
        <select name="services[]" class="mt-1 block w-full rounded-lg" multiple>
        @foreach ($services as $service)
            <option value="{{$service->id}}" {{ in_array($service->id, $space->services->pluck('id')->toArray()) ? 'selected' : '' }}>{{$service->description_ES}}</option>
        @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="spaceType">Tipo de espacio</label>
        <select name="spaceType" class="mt-1 block w-full rounded-lg">
            @foreach ($spaceTypes as $spaceType)
                <option value="{{ $spaceType->id }}" {{ $spaceType->id == $space->space_type_id ? 'selected' : '' }}>
                    {{ $spaceType->description_ES }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="mt-1 block w-full rounded-lg" style="@error('email') border-color:RED; @enderror" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" value="{{$space->email}}" />
        @error('email')
        <div>{{$message}}</div><br />
        @enderror
    </div>   

    <div class="mb-3">
        <label for="phone">Phone</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('phone') border-color:RED; @enderror" name="phone" value="{{$space->phone}}"  />
        @error('phone')
        <div>{{$message}}</div><br />
        @enderror   
    </div>
    <div class="mb-3">
        <label for="website">Website</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('website') border-color:RED; @enderror" name="website" value="{{$space->website}}"/>
        @error('website')
        <div>{{$message}}</div>
        @enderror   
    </div>

    <div class="mb-3">
        <label for="accessType">Acceso para minusválidos</label>
        <select class="form-label rounded-lg" name="accessType">
            <option value="n" {{ $space->accessType == 'n' ? 'selected' : '' }}>No</option>
            <option value="y" {{ $space->accessType == 'y' ? 'selected' : '' }}>Sí</option>
            <option value="p" {{ $space->accessType == 'p' ? 'selected' : '' }}>Parcial</option>
        </select>
    </div>
  
    </div>
</div>
     

    <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Actualizar" >
</form>
</body>
</html>