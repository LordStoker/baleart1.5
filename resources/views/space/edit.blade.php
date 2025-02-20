<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Space</title>
    
</head>
<body>
    {{-- @if (count($errors->all()) === 1)
        <h2>Tenim 1 error</h2>
    @elseif (count($errors->all()) > 1)
        <h2>Tenim multiples errors</h2>
    @else
        <h2>No tenim cap error</h2> 
    @endif --}}

    {{--  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif --}}
  <div class="row row-cols-1 row-cols-md-3 g-4 ">
    @include('components.editcard-spaces',['space' => $space])    
</div>

    {{-- @dd($errors) --}}
</body>
</html>