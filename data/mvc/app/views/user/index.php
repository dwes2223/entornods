<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>    
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Lista de usuarios</h1>    
<table>
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Fecha Nacimiento</th>
    </tr>
    <?php foreach ($users as $key => $user) { ?>
          <tr>
          <td><?php echo $user->name ?></td>
          <td><?php echo $user->surname ?></td>
          <td><?php echo $user->email ?></td>          
          <!-- Formato añadido en rama mvc04 v2 (despues de READ) --> 
          <td><?php echo $user->birthdate ? $user->birthdate->format('d-m-Y') : 'Fecha nac. desconocida' ?></td>                   
          <td>
            <a href="/user/show/<?php echo $user->id ?>" class="btn btn-primary">Ver </a>
          </td>
          <td>
            <a href="/user/edit/<?php echo $user->id ?>" class="btn btn-primary">Editar</a>
          </td>
          </tr>
        <?php } ?>
    
    
</table>
    
</body>
</html>