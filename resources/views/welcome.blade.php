<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Formulario de inicio</title>
</head>
<body>
    <div class="container mt-3">
        <form action="{{ route('toys.list') }}" method="GET">
            <h2>Necesitamos tus datos:</h2>
            <div class="form-group">
                <input type="text" class="form-control mt-3" id="name" name="name" placeholder="Nombre" required><br><br>
            </div>
            <div class="form-group">
                <input type="email" class="form-control mt-3" id="email" name="email" placeholder="Correo"><br><br>
            </div>
            <div></div>
            <select class="form-control mt-3" name="id_kidgenre" id="id_kidgenre" required>
                <option value="1">Niño</option>
                <option value="2">Niña</option>
            </select>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
