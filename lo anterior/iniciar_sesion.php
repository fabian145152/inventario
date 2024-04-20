<?php
require_once "funciones.php";

$usuario = limpiar_cadena($_POST['login_usuario']);
$clave = limpiar_cadena($_POST['login_clave']);
/**/
#Verifico campos obligatorios
if ($usuario == "" || $clave == "") {
    echo "<div>
    <strong>!Ocurrio un error inesperado</strong><br>
    Leene ambos campos obligatorios
</div>";
    exit();
}

//print_r(PDO::getAvailableDrivers());


#Verificando datos ingresados
if (verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)) {
    echo "<div>
    <strong>!Ocurrio un error inesperado</strong><br>
    Leene ambos campos obligatorios
</div>";
    exit();
}

if (verificar_datos("[a-zA-Z0-9$@.-]{4,20}", $clave)) {
    echo "<div>
    <strong>!El password es incorrecto</strong><br>
    Leene ambos campos obligatorios
</div>";
    exit();
}

$check_user = conexion();
$check_user = $check_user->query("SELECT * FROM usuario WHERE usuario_usuario = '$usuario'");

if ($check_user->rowCount() == 1) {
    $check_user = $check_user->fetch();
    if ($check_user['usuario_usuario'] == $usuario && password_verify($clave, $check_user['usuario_clave'])) {

        $_SESSION['íd'] = $check_user['usuario_clave'];
        $_SESSION['nombre'] = $check_user['usuario_nombre'];
        $_SESSION['apellido'] = $check_user['usuario_apellido'];
        $_SESSION['usuario'] = $check_user['usuario_usuario'];

        if (headers_sent()) {
            echo "<script> window.location.href='index.php?vista=home</script>";
        } else {
            header("Location: index.php?vista=home");
        }
    } else {
        echo "El usuario o Contraseña no corresponde!";
    }
} else {
    echo "El usuario no corresponde!";
}

#Cierro la conexion
$check_user = null;
