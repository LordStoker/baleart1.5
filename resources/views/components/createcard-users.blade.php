<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
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

<form action="{{ route('user.store') }}" method="post">
    @csrf <!-- Security Token --> <!-- Cambio de method a 'PUT', en caso contrario llamaría al show -->
    <div class="mb-3">
        <label for="name">Nombre</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('name') border-color:RED; @enderror" name="name" />
        @error('name')
        <div>{{$message}}</div><br />
        @enderror
    </div>  

    <div class="mb-3">
        <label for="last_name">Apellidos</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('last_name') border-color:RED; @enderror" name="last_name" />
        @error('last_name')
        <div>{{$message}}</div><br />
        @enderror   
    </div>


    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="mt-1 block w-full rounded-lg" style="@error('email') border-color:RED; @enderror" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9._%+-@]/g, '')" />
        @error('email')
        <div>{{$message}}</div><br />
        @enderror
    </div>   

    <div class="mb-3">
        <label for="phone">Teléfono</label>
        <input type="text" class="mt-1 block w-full rounded-lg" style="@error('phone') border-color:RED; @enderror" name="phone"  />
        @error('phone')
        <div>{{$message}}</div><br />
        @enderror   
    </div>

    <div class="mb-3">
        <label for="password">Contraseña</label>
        <input type="password" class="mt-1 block w-full rounded-lg" style="@error('password') border-color:RED; @enderror" name="password"  />
        @error('password')
        <div>{{$message}}</div><br />
        @enderror   
    </div>
     

    <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Crear" >
</form>
</body>
</html>