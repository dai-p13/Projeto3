<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Contadores Histórias</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Nome</td>
<td>Email</td>
<td>Telefone</td>
<td>Telemovel</td>
<td>Observacoes</td>
</tr>
@foreach ($contadorHistorias as $conHist)
<tr>
<td>{{ $conHist->id_contadorHistorias }}</td>
<td>{{ $conHist->nome }}</td>
<td>{{ $conHist->email }}</td>
<td>{{ $conHist->telefone }}</td>
<td>{{ $conHist->telemovel }}</td>
<td>{{ $conHist->observacoes }}</td>
</tr>
@endforeach
</table>
</body>
</html>