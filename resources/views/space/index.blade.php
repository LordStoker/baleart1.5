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
     <x-messages type="danger"/>
<div class="row row-cols-1 row-cols-md-3 g-4 ">
    @each('components.card-spaces',$spaces,'space')
    {{$spaces->links()}}    
</div>

</body>
</html>