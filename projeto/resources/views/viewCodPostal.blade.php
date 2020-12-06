<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Codigos Postais</title>
</head>
<body>
<table border = "1">
<tr>
<td>Codigo Postal</td>
<td>Localidade</td>

</tr>
@foreach ($cod_postais as $cod)
<tr>
<td>{{ $cod->codPostal }}</td>
<td>{{ $cod->localidade }}</td>
</tr>
@endforeach
</table>
</body>
</html>