<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/Universidades</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID Universidade</td>
<td>Ano de Participação</td>
</tr>
@foreach ($projuniversidades as $projuni)
<tr>
<td>{{ $projuni->id_projeto }}</td>
<td>{{ $projuni->id_universidade }}</td>
<td>{{ $projuni->anoParticipacao }}</td>
</tr>
@endforeach
</table>
</body>
</html>