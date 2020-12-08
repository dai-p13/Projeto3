<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/Utilizador</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID Utilizador</td>
</tr>
@foreach ($projutilizadores as $projutil)
<tr>
<td>{{ $projutil->id_projeto }}</td>
<td>{{ $projutil->id_utilizador }}</td>
</tr>
@endforeach
</table>
</body>
</html>