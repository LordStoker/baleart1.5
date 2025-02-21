<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Space</title>
</head>
<body>
    {{-- @if (count($errors->all()) === 1)
        <h2>Tenim 1 error</h2>
    @elseif (count($errors->all()) > 1)
        <h2>Tenim multiples errors</h2>
    @else
        <h2>No tenim cap error</h2> 
    @endif --}}
    @if (session('status'))
        <div class="alert alert-primary role='alert'">
            {{ session('status') }}
        </div>
    @endif
    {{-- @include('components.alert') --}}
    {{-- <x-alert /> --}}

    {{-- @php 
    $componentName = ''; 
    if ($errors->any()) {
        $componentName = 'alert'; 
    } else {
        $componentName = 'success'; 
    }
@endphp 

<x-dynamic-component :component="$componentName">
</x-dynamic-component> --}}
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
        @include('components.createcard-spaces')    
    </div>

</body>
</html>