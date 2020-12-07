<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Trocas Agrupamento</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Agrupamento Antigo</td>
<td>Novo Agrupamento</td>
<td>Observacoes</td>
<td>ID Professor</td>
</tr>
@foreach ($trocas as $troc)
<tr>
<td>{{ $troc->id_troca }}</td>
<td>{{ $troc->agrupamentoAntigo }}</td>
<td>{{ $troc->novoAgrupamento }}</td>
<td>{{ $troc->observacoes }}</td>
<td>{{ $troc->id_professor }}</td>
</tr>
@endforeach
</table>
</body>
</html>