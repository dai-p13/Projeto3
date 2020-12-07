<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/Professor</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID Professor</td>
<td>Ano de Participação</td>
<td>ID Cargo</td>
</tr>
@foreach ($projprofessores as $projprofs)
<tr>
<td>{{ $projprofs->id_projeto }}</td>
<td>{{ $projprofs->id_professor }}</td>
<td>{{ $projprofs->anoParticipacao }}</td>
<td>{{ $projprofs->id_cargo }}</td>
</tr>
@endforeach
</table>
</body>
</html>