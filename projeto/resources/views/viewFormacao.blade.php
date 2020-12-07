<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Formações</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID</td>
<td>Nome da Instituição</td>
<td>Email</td>
</tr>
@foreach ($formacoes as $forma)
<tr>
<td>{{ $forma->id_formacao }}</td>
<td>{{ $forma->nomeInstituicao }}</td>
<td>{{ $forma->email }}</td>
</tr>
@endforeach
</table>
</body>
</html>