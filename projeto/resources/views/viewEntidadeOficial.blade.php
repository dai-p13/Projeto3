<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Entidades Oficiais</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Nome</td>
<td>Email</td>
<td>Entidade</td>
<td>Telefone</td>
<td>Telemóvel</td>
<td>Observações</td>
</tr>
@foreach ($entOficiais as $eo)
<tr>
<td>{{ $eo->id_entidadeOficial }}</td>
<td>{{ $eo->nome }}</td>
<td>{{ $eo->email }}</td>
<td>{{ $eo->entidade }}</td>
<td>{{ $eo->telefone }}</td>
<td>{{ $eo->telemovel }}</td>
<td>{{ $eo->observacoes }}</td>
</tr>
@endforeach
</table>
</body>
</html>