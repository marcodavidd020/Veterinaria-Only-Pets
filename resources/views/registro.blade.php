<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="{{route('usuarios.store')}}" method="post">
        @csrf
        <input type="text" name="nombre" 
        placeholder="Nombre" value="{{ old('nombre') }}">
        <br>
        <input type="text" name="apellido_paterno" 
        placeholder="Apellido Paterno" value="{{ old('apellido_paterno') }}">
        <br>
        <input type="text" name="apellido_materno" 
        placeholder="Apellido Materno" value="{{ old('apellido_materno') }}">
        <br>
        <input type="text" name="ci" 
        placeholder="Ci" value="{{ old('ci') }}">
        <br>
        <input type="text" name="direccion" 
        placeholder="Direccion" value="{{ old('direccion') }}">
        <br>
        <input type="email" name="email" 
        placeholder="Email" value="{{ old('email') }}">
        <br>
        <input type="date" name="fecha_de_nacimiento" 
        value="{{ old('fecha_de_nacimiento') }}">
        <br>
        <input type="text" name="sexo" 
        placeholder="sexo" value="{{ old('sexo') }}">
        <br>
        <input type="text" name="nombre_usuario" 
        placeholder="Nombre de usuario" value="{{ old('nombre_usuario') }}">
        <br>
        <input type="password" name="password" 
        placeholder="password">
        <br>
        <input type="submit">
    </form>
</body>
</html>