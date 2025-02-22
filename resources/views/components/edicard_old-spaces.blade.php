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
    @if (session('status'))
    <div class="alert alert-primary role='alert'">
        {!!session('status') !!}
    </div>
@endif


<form action="{{ route('space.update', ['space' => $space->id]) }}" method="post">
    @csrf <!-- Security Token --> 
    @method('PUT') <!-- Cambio de method a 'PUT', en caso contrario llamaría al show -->
    <label for="name">Nombre</label>
    <input type="text" style="@error('name') border-color:RED; @enderror" name="name" value="{{$space->name}}" />
    @error('name')
    <div>{{$message}}</div><br />
    @enderror   

    <label for="regNumber">Nº Registro</label>
    <input type="text" style="@error('regNumber') border-color:RED; @enderror" name="regNumber" value="{{$space->regNumber}}" readonly />
    @error('regNumber')
    <div>{{$message}}</div><br />
    @enderror   

    <label for="observation_CA">Descripción_CA</label>
    <textarea type="text" style="@error('observation_CA') border-color:RED; @enderror" name="observation_CA">{{$space->observation_CA}}</textarea>
    @error('observation_CA')
    <div>{{$message}}</div><br />
    @enderror   
    

    <label for="observation_ES">Descripción_ES</label>
    <textarea type="text" style="@error('observation_ES') border-color:RED; @enderror" name="observation_ES">{{$space->observation_ES}}</textarea>
    @error('observation_ES')
    <div>{{$message}}</div><br />
    @enderror   

    <label for="observation_EN">Descripción_EN</label>
    <textarea type="text" style="@error('observation_EN') border-color:RED; @enderror" name="observation_EN">{{$space->observation_EN}}</textarea>
    @error('observation_EN')
    <div>{{$message}}</div><br />
    @enderror   

    <label for="email">Email</label>
    <input type="text" style="@error('email') border-color:RED; @enderror" name="email" value="{{$space->email}}"/>
    @error('email')
    <div>{{$message}}</div><br />
    @enderror   

    <label for="phone">Phone</label>
    <input type="text" style="@error('phone') border-color:RED; @enderror" name="phone" value="{{$space->phone}}" />
    @error('phone')
    <div>{{$message}}</div><br />
    @enderror   

    <label for="website">Website</label>
    <input type="text" style="@error('website') border-color:RED; @enderror" name="website" value="{{$space->website}}"/>
    @error('website')
    <div>{{$message}}</div>
    @enderror   

    <label for="accessType">AccesType</label>
    <input type="text" style="@error('accessType') border-color:RED; @enderror" name="accessType" value="{{$space->accessType}}" />
    @error('accessType')
    <div>{{$message}}</div><br />
    @enderror   
     

    <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Actualizar" >
</form>
</body>
</html>