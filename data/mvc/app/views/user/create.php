<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Alta de usuario</h1>

<form method="post" action="/user/store">

<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="name" class="form-control">
</div>
<br>
<div class="form-group">
    <label>Apellidos</label>
    <input type="text" name="surname" class="form-control">
</div>
<br>
<div class="form-group">
    <label>Correo electronico</label>
    <input type="text" name="email" class="form-control">
</div>
<br>
<div class="form-group">
    <label>Fecha de cumpleaños</label>
    <input type="date" name="birthdate" required class="form-control">
</div>
<br>
<button type="submit" class="btn btn-default">Enviar</button>
<br>
</form>
</body>
</html>