<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Space</title>
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

    <h3>Create Space</h3>
    <form action="{{ route('space.store') }}" method="post">
        @csrf <!-- Security Token --> 
        <label for="nombre">Nombre</label>
        <input type="text" style="@error('nombre') border-color:RED; @enderror" name="nombre" />
        @error('nombre')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="regNumber">Nº Registro</label>
        <input type="text" style="@error('regNumber') border-color:RED; @enderror" name="regNumber" />
        @error('regNumber')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="descripcion_ca">Descripción_CA</label>
        <input type="text" style="@error('descripcion_ca') border-color:RED; @enderror" name="descripcion_ca" />
        @error('descripcion_ca')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="descripcion_es">Descripción_ES</label>
        <input type="text" style="@error('descripcion_es') border-color:RED; @enderror" name="descripcion_es" />
        @error('descripcion_es')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="descripcion_en">Descripción_EN</label>
        <input type="text" style="@error('descripcion_en') border-color:RED; @enderror" name="descripcion_en" />
        @error('descripcion_en')
        <div>{{$message}}</div><br />
        @enderror   
    
        <label for="email">Email</label>
        <input type="text" style="@error('email') border-color:RED; @enderror" name="email" />
        @error('email')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="phone">Phone</label>
        <input type="text" style="@error('phone') border-color:RED; @enderror" name="phone" />
        @error('phone')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="website">Website</label>
        <input type="text" style="@error('website') border-color:RED; @enderror" name="website" />
        @error('website')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="accesstype">AccesType</label>
        <input type="text" style="@error('accesstype') border-color:RED; @enderror" name="accesstype" />
        @error('accesstype')
        <div>{{$message}}</div><br />
        @enderror   
         
    
        <input type="submit" value="Crear" >
    </form>
    @dd($errors)
</body>
</html>