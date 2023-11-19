<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion de usuario</title>
</head>
<body>
    <h1>Edicion de usuario</h1>
    <form action="/user/update" method="post">
        <input type="hidden" name="id" value="<?php echo $user->id?>">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="<?= $user->name?>">
        </div>
        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" value="<?= $user->surname?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= $user->email?>">
        </div>
        <div class="form-group">
            <label for="birthdate">Fecha Nac</label>
            <input type="date" name="birthdate" id="birthdate" required value="<?= $user->birthdate->format('Y-m-d')?>">
        </div>
        <br>
        <button type="submit" class="btn btn-default">Enviar</button>     
    </form>
</body>
</html>