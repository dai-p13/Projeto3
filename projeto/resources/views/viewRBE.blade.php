<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Redes Bibliotecas Escolares</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Região</td>
<td>Nome do Coordenador</td>
<td>ID Concelho</td>
</tr>
@foreach ($rbe as $biblio)
<tr>
<td>{{ $biblio->id_rbe }}</td>
<td>{{ $biblio->regiao }}</td>
<td>{{ $biblio->nomeCoordenador }}</td>
<td>{{ $biblio->id_concelho }}</td>
</tr>
@endforeach
</table>
</body>
</html>