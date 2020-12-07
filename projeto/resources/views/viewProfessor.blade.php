<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Professores</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Nome</td>
<td>Telefone</td>
<td>Telemovel</td>
<td>Email</td>
<td>ID Agrupamento</td>
</tr>
@foreach ($professores as $prof)
<tr>
<td>{{ $prof->id_professor }}</td>
<td>{{ $prof->nome }}</td>
<td>{{ $prof->telefone }}</td>
<td>{{ $prof->telemovel }}</td>
<td>{{ $prof->email }}</td>
<td>{{ $prof->id_agrupamento }}</td>
</tr>
@endforeach
</table>
</body>
</html>