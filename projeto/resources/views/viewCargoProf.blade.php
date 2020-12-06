<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cargos dos Professores</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Nome Cargo</td>
</tr>
@foreach ($cargos as $cargo)
<tr>
<td>{{ $cargo->id_cargoProfessor }}</td>
<td>{{ $cargo->nomeCargo }}</td>
</tr>
@endforeach
</table>
</body>
</html>