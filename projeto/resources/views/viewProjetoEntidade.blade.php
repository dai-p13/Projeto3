<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/Entidades</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID Entidade Oficial</td>
<td>Ano de Participação</td>
</tr>
@foreach ($projentidade as $projent)
<tr>
<td>{{ $projent->id_projeto }}</td>
<td>{{ $projent->id_entidadeOficial }}</td>
<td>{{ $projent->anoParticipacao }}</td>
</tr>
@endforeach
</table>
</body>
</html>