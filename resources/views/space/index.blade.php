<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Spaces</title>
</head>
<body>
    @if (session('status'))
    <div class="alert alert-primary role='alert'">
        {{ session('status') }}
    </div>
@endif
    <table border='1'>
        <thead>
            <th>id</td>
            <th>name</th>
            <th>regNumber</th>
            <th>observation_CA</th>
            <th>observation_ES</th>
            <th>observation_EN</th>
            <th>email</th>
            <th>phone</th>
            <th>website</th>
            <th>Puntuación</th>
            <th>Dirección</th>
            <th>Tipo de espacio</th>
            <th>Gestor</th>
            <th>Modalidades</th>
            <th>Servicios</th>
            <th>accessType</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Actions</th>
        </thead>
        @foreach ($spaces as $space)
            <tr>
                <td>{{ $space->id }}</td>
                <td>{{ $space->name }}</td>
                <td>{{ $space->regNumber }}</td>
                <td>{{ $space->observation_CA }}</td>
                <td>{{ $space->observation_ES }}</td>
                <td>{{ $space->observation_EN }}</td>
                <td>{{ $space->email }}</td>
                <td>{{ $space->phone }}</td>
                <td>{{ $space->website }}</td>
                <td>{{ $space->totalScore }}</td>
                <td>{{ $space->address->name }}</td>
                <td>{{ $space->space_type->name }}</td>  
                <td>{{ $space->user->name }}</td>
                <td>
                    @foreach ($space->modalities as $modality)
                        {{ $modality->name }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($space->services as $service)
                        {{ $service->name }}<br>
                    @endforeach
                </td>
                <td>{{ $space->accessType }}</td>   
                <td>{{ $space->created_at }}</td>
                <td>{{ $space->updated_at }}</td>
                <td>
                    <form action="{{route('space.destroy', ['space' => $space->id ])}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn tbn-danger btn-sm">Delete</button>
                    </form> 
                  </td>
            </tr>
        @endforeach
    </table>

</body>
</html>