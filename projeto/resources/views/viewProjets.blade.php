<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Projetos</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Nome</td>
<td>Objetivos</td>
<td>Regulamento</td>
<td>Publico Alvo</td>
<td>Observacoes</td>
</tr>
@foreach ($projetos as $proj)
<tr>
<td>{{ $proj->id_projeto }}</td>
<td>{{ $proj->nome }}</td>
<td>{{ $proj->objetivos }}</td>
<td>{{ $proj->regulamento }}</td>
<td>{{ $proj->publicoAlvo }}</td>
<td>{{ $proj->observacoes }}</td>
</tr>
@endforeach
</table>
</body>
</html>