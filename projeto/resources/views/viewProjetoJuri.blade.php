<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/Juri</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID Juri</td>
<td>Ano de Participação</td>
</tr>
@foreach ($projjuris as $projur)
<tr>
<td>{{ $projur->id_projeto }}</td>
<td>{{ $projur->id_juri }}</td>
<td>{{ $projur->anoParticipacao }}</td>
</tr>
@endforeach
</table>
</body>
</html>