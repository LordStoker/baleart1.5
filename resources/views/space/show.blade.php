<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Spaces</title>
</head>
<body>

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
                <th>totalScore</th>
                <th>address_id</th>
                <th>space_type_id</th>
                <th>user_id</th>
                <th>accessType</th>
                <th>created_at</th>
                <th>updated_at</th>
                     
            </thead>
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
                <td>{{ $space->address_id }}</td>
                <td>{{ $space->space_type_id }}</td>
                <td>{{ $space->user_id }}</td>
                <td>{{ $space->accessType }}</td>   
                <td>{{ $space->created_at }}</td>
                <td>{{ $space->updated_at }}</td>
            </tr>
       
    </table>

</body>
</html>