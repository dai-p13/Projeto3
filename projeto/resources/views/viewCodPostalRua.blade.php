<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Códigos Postais Rua</title>
</head>
<body>
<table border = "1">
<tr>
<td>Código Postal Rua</td>
<td>Código Postal</td>
<td>Rua</td>
<td>Número da Porta</td>
</tr>
@foreach ($codPostalRuas as $codRuas)
<tr>
<td>{{ $codRuas->codPostalRua }}</td>
<td>{{ $codRuas->codPostal }}</td>
<td>{{ $codRuas->rua }}</td>
<td>{{ $codRuas->numPorta }}</td>
</tr>
@endforeach
</table>
</body>
</html>