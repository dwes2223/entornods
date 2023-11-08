<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Lista de usuarios</h1>    
<table>
    <?php foreach($users as $user) {?>
        <tr>
        <td><?php echo $user[0] ?></td>
        <td><?php echo $user[1] ?></td>
        <td>
            <!-- Hay que cambiar el enlace para que la llamada sea correcta.
            <a href="?method=show&id=<?php echo $user[0] ?>">Ver</a> -->
            <a href="/user/show/<?php echo $user[0] ?>">Ver</a> 
        </td>
        </tr>
    <?php } ?>
</table>
    
</body>
</html>