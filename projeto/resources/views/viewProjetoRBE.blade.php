<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/RBE</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID RBE</td>
<td>Ano de Participação</td>
</tr>
@foreach ($projredes as $projrbe)
<tr>
<td>{{ $projrbe->id_projeto }}</td>
<td>{{ $projrbe->id_rbe }}</td>
<td>{{ $projrbe->anoParticipacao }}</td>
</tr>
@endforeach
</table>
</body>
</html>