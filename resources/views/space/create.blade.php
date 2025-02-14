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

     @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

    <h3>Create Space</h3>
    <form action="{{ route('space.store') }}" method="post">
        @csrf <!-- Security Token --> 
        <label for="name">Nombre</label>
        <input type="text" name="name" />

        <label for="url_clean">Nº Registro</label>
        <input type="text" name="registro" />

        <label for="url_clean">Descripción_CA</label>
        <input type="text" name="descripcion_ca" />

        <label for="url_clean">Descripción_ES</label>
        <input type="text" name="descripcion_es" />

        <label for="url_clean">Descripción_EN</label>
        <input type="text" name="descripcion_en" />
    
        <label for="url_clean">Email</label>
        <input type="text" name="email" />

        <label for="url_clean">Phone</label>
        <input type="text" name="phone" />

        <label for="url_clean">Website</label>
        <input type="text" name="website" />

        <label for="url_clean">AccesType</label>
        <input type="text" name="accesstype" />
         
    
        <input type="submit" value="Crear" >
    </form>
    @dd($errors)
</body>
</html>