<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Actualización</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Actualizar Información</h2>
        <form action="{{ route('usuarios.update', $user->id) }}" method="post">
            @method('PUT') 
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="names" name="names" value="{{ old('names', $user->names) }}">
            </div>
            <div class="mb-3">
                <label for="lastnames" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="lastnames" name="lastnames" value="{{ old('lastnames', $user->lastnames) }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}">
            </div>
            <a href="{{ route ('usuarios.index') }} "><button type="submit" class="btn btn-primary">Actualizar</button></a>
            @if(session('success'))
                <div class="alert alert-success">
                    <strong>Bien hecho!</strong> {{ session('success') }}
                </div>
            @endif
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
