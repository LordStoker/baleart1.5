<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Spaces</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @if (session('status'))
    <div class="alert alert-primary role='alert'">
        {!! session('status') !!}
    </div>
@endif

     <!-- Llamada a un class component -->
     {{-- @component('components.messages', ['type' => 'danger'])
     @endcomponent --}}
     {{-- <x-messages type="danger"/> --}}

     {{-- <x-messages type="warning">
        <x-slot name="title">
          <h2>Esto es una alerta</h2>
        </x-slot>
        Este texto lo mostrará donde haya puesto el slot en el componente
    </x-messages> --}}
     {{-- @component('components.messages', [
        'type' => 'danger',
        'title' => '<h1 class="alert-heading">Este es el título</h1>',
        ])
    @endcomponent --}}
    {{-- <x-messages type="danger" style="background-color: coral">
        <x-slot name="title">
          <h1 class="alert-heading" >Este es el título</h1>
        </x-slot>
        <x-slot name="mayusculas">
            Hola que tal 
        </x-slot>
        Este texto lo mostrará donde haya puesto el slot genérico en el componente
    </x-messages> --}}
    {{-- @php
        $componentName = "messages";
    @endphp

    @php
        $error = 'success';
    @endphp

<x-dynamic-component :component="$componentName" type="{{$error}}" style="background-color: coral">
    <x-slot name="title" >
        <h1 class="alert-heading" >Este es el título dynamic-component</h1>
    </x-slot>
    <x-slot name="mayusculas">
        Hola que tal 
    </x-slot>
    Este es un aviso success. Que viene de un dynamic-component
</x-dynamic-component> --}}
    {{-- <x-messages type="warning" style="background-color: coral">
        <x-slot name="title">
            <h1 class="alert-heading">Esto es un Warning</h1>
        </x-slot>
        <x-slot name="mayusculas">
        </x-slot>
        Este texto lo mostrará donde haya puesto el slot en el componente
    </x-messages> --}}
<div class="row row-cols-1 row-cols-md-3 g-4 ">
    @each('components.card-spaces',$spaces,'space')
    {{$spaces->links()}}    
</div>

</body>
</html>