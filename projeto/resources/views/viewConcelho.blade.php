<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Concelhos</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id do Concelho</td>
<td>Nome do Concelho</td>
</tr>
@foreach ($concelhos as $conc)
<tr>
<td>{{ $conc->id_concelho }}</td>
<td>{{ $conc->nome }}</td>
</tr>
@endforeach
</table>
</body>
</html>