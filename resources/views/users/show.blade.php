<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-body">
                    <ol>
                        <li>Nombres: {{ $user->names }}</li>
                        <li>Apellidos: {{ $user->lastnames }}</li>
                        <li>Correo: {{ $user->email }}</li>
                        <li>Direccion: {{ $user->address }}</li>
                        <li>Password: {{ $user->password }}</li>
                    </ol>
                    <a href="{{ route('usuarios.index') }}">Ir al index</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
