<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/Escola</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID Escola Solidária</td>
<td>Ano de Participação</td>
</tr>
@foreach ($projescola as $projesc)
<tr>
<td>{{ $projesc->id_projeto }}</td>
<td>{{ $projesc->id_escolaSolidaria }}</td>
<td>{{ $projesc->anoParticipacao }}</td>
</tr>
@endforeach
</table>
</body>
</html>