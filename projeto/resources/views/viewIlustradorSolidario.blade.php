<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Ilustradores Solidarios</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Volume do Livro</td>
<td>Disponibilidade</td>
<td>Nome</td>
<td>Telefone</td>
<td>Telemovel</td>
<td>Email</td>
<td>Observacoes</td>
</tr>
@foreach ($ilusolidario as $ilus)
<tr>
<td>{{ $ilus->id_ilustradorSolidario }}</td>
<td>{{ $ilus->volumeLivro }}</td>
<td>{{ $ilus->disponivel }}</td>
<td>{{ $ilus->nome }}</td>
<td>{{ $ilus->telefone }}</td>
<td>{{ $ilus->telemovel }}</td>
<td>{{ $ilus->email }}</td>
<td>{{ $ilus->observacoes }}</td>
</tr>
@endforeach
</table>
</body>
</html>