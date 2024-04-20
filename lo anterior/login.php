<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" autocomplete="off">
        <div>
            <label for="Usuario">Usuario</label>
            <input type="text" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
        </div>
        <div>
            <label for="Password">Password</label>
            <input type="text" type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{4,20}" maxlength="30" required>
        </div>
        <p>
            <button type="submit">Iniciar Sesion</button>
        </p>
        <?php
        if (isset($_POST['login_usuario']) && isset($_POST['login_clave'])) {
            require_once "funciones.php";
            require_once "iniciar_sesion.php";
            echo "Entrada";
        }
        ?>
    </form>
</body>

</html>