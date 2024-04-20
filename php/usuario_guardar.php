<?php
require_once "main.php";
#Almacenando datos
echo $nombre = limpiar_cadena($_POST['nombre_usuario']);
echo $apellido = limpiar_cadena($_POST['apellido_usuario']);
echo $nick = limpiar_cadena($_POST['nick_usuario']);
echo $password = limpiar_cadena($_POST['password_usuario']);
echo $email = limpiar_cadena($_POST['email_usuario']);

#verifica campos obligarorios

if ($nombre == "" || $apellido == "" || $nick == "" || $password == "" || $email == "") {
    echo "Campos incompletos";
    exit();
}

if (verificar_datos("[a-zA-Z0-9 ]{4,20}", $nombre)) {
    echo "El nombre no coincide con el formato especificado";
    exit();
}


if (verificar_datos("[a-zA-Z0-9 ]{4,20}", $apellido)) {
    echo "El apellido no coincide con el formato especificado";
    exit();
}


if (verificar_datos("[a-zA-Z0-$@]{4,20}", $nick)) {
    echo "El nick no coincide con el formato especificado";
    exit();
}

if (verificar_datos("[a-zA-Z0-9$@]{4,20}", $password)) {
    echo "El Password no coincide con el formato especificadoooooooooo";
    exit();
}
if ($email != "") {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $check_email = conexion();
        $check_email = $check_email->query("SELECT usuario_email FROM usuario WHERE usuario_email='$email'");
        if ($check_email->rowCount() > 0) {
            echo '
            <div class="notification is-dangeer is-ligth">
                <strong>!Ocurrio in error inesperado!</strong><br>
                El correo ingresaro ya se encuentra registrado, por
                favor elija otro</div>
            ';
            exit();
        }
        $check_email = null;
    } else {
        echo '
         <div class="notification is-danger is-ligth">
            <strong>!Ocurrio un error inesperado"</strong><br>
            El EMAIL ingresado no es valido
            </div>';
        exit();
    }
}

# Verificando usuario

$check_usuario=conexion();
$check_usuario=$check_usuario-pg_query(=)
