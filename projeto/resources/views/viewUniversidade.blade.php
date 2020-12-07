<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Universidades</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Curso</td>
<td>Tipo</td>
<td>Nome</td>
<td>Telefone</td>
<td>Telemovel</td>
<td>Email</td>
</tr>
@foreach ($universidades as $uni)
<tr>
<td>{{ $uni->id_universidade }}</td>
<td>{{ $uni->curso }}</td>
<td>{{ $uni->tipo }}</td>
<td>{{ $uni->nome }}</td>
<td>{{ $uni->telefone }}</td>
<td>{{ $uni->telemovel }}</td>
<td>{{ $uni->email }}</td>
</tr>
@endforeach
</table>
</body>
</html>