<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Utilizadores</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Nome</td>
<td>Telefone</td>
<td>telemovel</td>
<td>Email</td>
<td>Tipo de Utilizador</td>
<td>Departamento</td>
</tr>
@foreach ($utilizadores as $user)
<tr>
<td>{{ $user->id_utilizador }}</td>
<td>{{ $user->nome }}</td>
<td>{{ $user->telefone }}</td>
<td>{{ $user->telemovel }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->tipoUtilizador }}</td>
<td>{{ $user->departamento }}</td>
</tr>
@endforeach
</table>
</body>
</html>