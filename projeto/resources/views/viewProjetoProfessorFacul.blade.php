<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos/Professor Faculdade</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Projeto</td>
<td>ID Professor Faculdade</td>
<td>Ano de Participação</td>
</tr>
@foreach ($projprofaculdades as $projprofacul)
<tr>
<td>{{ $projprofacul->id_projeto }}</td>
<td>{{ $projprofacul->id_professorFaculdade }}</td>
<td>{{ $projprofacul->anoParticipacao }}</td>
</tr>
@endforeach
</table>
</body>
</html>