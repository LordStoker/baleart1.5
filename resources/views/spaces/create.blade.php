<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Space</title>
</head>
<body>
    <h3>Create Space</h3>
    <form action="{{ route('spaces.store') }}" method="post">
        @csrf <!-- Security Token --> 
        <label for="title">Nombre</label>
        <input type="text" name="nombre" />

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
        <input type="text" name="url_clean" />

        <label for="url_clean">AccesType</label>
        <input type="text" name="website" />
         
    
        <input type="submit" value="Crear" >
    </form>
</body>
</html>