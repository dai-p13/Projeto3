<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Escolas Solidárias</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID</td>
<td>Nome</td>
<td>Telefone</td>
<td>Telemovel</td>
<td>Contacto Associação de Pais</td>
<td>ID Agrupamento</td>
</tr>
@foreach ($escsolidarias as $escsol)
<tr>
<td>{{ $escsol->id_escolaSolidaria }}</td>
<td>{{ $escsol->nome }}</td>
<td>{{ $escsol->telefone }}</td>
<td>{{ $escsol->telemovel }}</td>
<td>{{ $escsol->contactoAssPais }}</td>
<td>{{ $escsol->id_agrupamento }}</td>
</tr>
@endforeach
</table>
</body>
</html>