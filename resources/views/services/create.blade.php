<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Service</title>
</head>
<body>
    <h3>Create Service</h3>
    <form action="{{ route('services.store') }}" method="post">
        @csrf <!-- Security Token --> 
        <label for="title">Nombre</label>
        <input type="text" name="nombre" />

        <label for="url_clean">Descripción_CA</label>
        <input type="text" name="descripcion_ca" />

        <label for="url_clean">Descripción_ES</label>
        <input type="text" name="descripcion_es" />

        <label for="url_clean">Descripción_EN</label>
        <input type="text" name="descripcion_en" />
         
    
        <input type="submit" value="Crear" >
    </form>
</body>
</html>