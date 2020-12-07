<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Professores de Faculdades</title>
</head>
<body>
<table border = "1">
<tr>
<td>Id</td>
<td>Cargo</td>
<td>Nome</td>
<td>Telefone</td>
<td>Telemovel</td>
<td>Email</td>
<td>Observações</td>
</tr>
@foreach ($profacul as $profacul)
<tr>
<td>{{ $profacul->id_professorFaculdade }}</td>
<td>{{ $profacul->cargo }}</td>
<td>{{ $profacul->nome }}</td>
<td>{{ $profacul->telefone }}</td>
<td>{{ $profacul->telemovel }}</td>
<td>{{ $profacul->email }}</td>
<td>{{ $profacul->observacoes }}</td>
</tr>
@endforeach
</table>
</body>
</html>