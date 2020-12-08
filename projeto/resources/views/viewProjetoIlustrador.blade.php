<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/Ilustrador</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID Ilustrador</td>
<td>Ano de Participação</td>
</tr>
@foreach ($projilustradores as $projilus)
<tr>
<td>{{ $projilus->id_projeto }}</td>
<td>{{ $projilus->id_ilustradorSolidario }}</td>
<td>{{ $projilus->anoParticipacao }}</td>
</tr>
@endforeach
</table>
</body>
</html>