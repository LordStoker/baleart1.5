<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Service</title>
</head>
<body>

    @if (count($errors->all()) === 1)
    <h2>Tenim 1 error</h2>
@elseif (count($errors->all()) > 1)
    <h2>Tenim multiples errors</h2>
@else
    <h2>No tenim cap error</h2> 
@endif

{{--  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif --}}
    <h3>Create Service</h3>
    <form action="{{ route('service.store') }}" method="post">
        @csrf <!-- Security Token --> 
        <label for="title">Nombre</label>
        <input type="text" style="@error('nombre') border-color:RED; @enderror" name="nombre" />
        @error('nombre')
        <div>{{$message}}</div>
        @enderror     

        <label for="url_clean">Descripción_CA</label>
        <input type="text" style="@error('descripcion_ca') border-color:RED; @enderror" name="descripcion_ca" />
        @error('descripcion_ca')
        <div>{{$message}}</div>
        @enderror     

        <label for="url_clean">Descripción_ES</label>
        <input type="text" style="@error('descripcion_es') border-color:RED; @enderror" name="descripcion_es" />
        @error('descripcion_es')
        <div>{{$message}}</div>
        @enderror     

        <label for="url_clean">Descripción_EN</label>
        <input type="text" style="@error('descripcion_en') border-color:RED; @enderror" name="descripcion_en" />
        @error('descripcion_en')
        <div>{{$message}}</div>
        @enderror     
         
    
        <input type="submit" value="Crear" >
    </form>
</body>
</html>