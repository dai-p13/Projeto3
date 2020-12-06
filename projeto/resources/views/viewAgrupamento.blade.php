<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Agrupamentos</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Nome</td>
<td>Telefone</td>
<td>Email</td>
<td>Nome do Diretor</td>
</tr>
@foreach ($agrupamentos as $agrup)
<tr>
<td>{{ $agrup->id_agrupamento }}</td>
<td>{{ $agrup->nome }}</td>
<td>{{ $agrup->telefone }}</td>
<td>{{ $agrup->email }}</td>
<td>{{ $agrup->nomeDiretor }}</td>
</tr>
@endforeach
</table>
</body>
</html>