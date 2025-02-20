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
    @include('components.alert')
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
        <label for="name">Nombre</label>
        <input type="text" style="@error('name') border-color:RED; @enderror" name="name" />
        @error('name')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="regNumber">Nº Registro</label>
        <input type="text" style="@error('regNumber') border-color:RED; @enderror" name="regNumber" />
        @error('regNumber')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="observation_CA">Descripción_CA</label>
        <textarea type="text" style="@error('observation_CA') border-color:RED; @enderror" name="observation_CA" ></textarea>
        @error('observation_CA')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="observation_ES">Descripción_ES</label>
        <textarea type="text" style="@error('observation_ES') border-color:RED; @enderror" name="observation_ES" ></textarea>
        @error('observation_ES')
        <div>{{$message}}</div><br />
        @enderror   

        <label for="observation_EN">Descripción_EN</label>
        <textarea type="text" style="@error('observation_EN') border-color:RED; @enderror" name="observation_EN" ></textarea>
        @error('observation_EN')
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

        <label for="accessType">AccesType</label>
        <input type="text" style="@error('accessType') border-color:RED; @enderror" name="accessType" />
        @error('accessType')
        <div>{{$message}}</div><br />
        @enderror   
         
    
        <input type="submit" value="Crear" >
    </form>

</body>
</html>