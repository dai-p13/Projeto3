<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/Contadores</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID Contador</td>
<td>Ano de Participação</td>
</tr>
@foreach ($projcontadores as $projcont)
<tr>
<td>{{ $projcont->id_projeto }}</td>
<td>{{ $projcont->id_contador }}</td>
<td>{{ $projcont->anoParticipacao }}</td>
</tr>
@endforeach
</table>
</body>
</html>