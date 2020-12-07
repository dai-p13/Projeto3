<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Juris</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Nome</td>
<td>Email</td>
<td>Telefone</td>
<td>Telemovel</td>
</tr>
@foreach ($juris as $jur)
<tr>
<td>{{ $jur->id_juri }}</td>
<td>{{ $jur->nome }}</td>
<td>{{ $jur->email }}</td>
<td>{{ $jur->telefone }}</td>
<td>{{ $jur->telemovel }}</td>
</tr>
@endforeach
</table>
</body>
</html>