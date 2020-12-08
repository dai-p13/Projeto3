<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Universidade Professor Faculdade</title>
</head>
<body>
<table border = "1">
<tr>
<td>ID Universidade</td>
<td>ID Professor da Faculdade</td>
</tr>
@foreach ($uniproffaculdades as $uniprofacul)
<tr>
<td>{{ $uniprofacul->id_universidade }}</td>
<td>{{ $uniprofacul->id_professorFaculdade }}</td>

</tr>
@endforeach
</table>
</body>
</html>