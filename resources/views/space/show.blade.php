<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Space</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="row row-cols-1 row-cols-md-3 g-4 ">
        @include('components.card-spaces',['space' => $space])    
    </div>


</body>
</html>