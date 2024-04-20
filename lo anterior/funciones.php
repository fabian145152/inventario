<?php

#Conexiona a la base de datos
function conexion()
{
    $pdo = new PDO('mysql:host=localhost;dbname=inventario', 'root', 'belgrado');
    return $pdo;
}

//conexion();

#Verificar datos
function verificar_datos($filtro, $cadena)
{
    if (preg_match("/^" . $filtro . "$/", $cadena)) {
        return false;
    } else {
        return true;
    }
}


/*
es un ejemplo para la funcion verificar daros, mide cantidad de caracteres y tipos
$nombre = "Fabian7";

if (verificar_datos("[a-zA-Z]{6,10}", $nombre)) {
    echo "Los datos no coinciden";
}
*/

#limpiar cadena para evirat inyeccion de caracteres en sql
function limpiar_cadena($cadena)
{
    $cadena = trim($cadena);                //limpia caracteres en blanco de la cadena
    $cadena = stripslashes($cadena);          //quita las barras y las comillas escapadas
    $cadena = str_ireplace("<script>", "", $cadena);     //reemplaza >script> por nada
    $cadena = str_ireplace("</script>", "", $cadena);
    $cadena = str_ireplace("<script src", "", $cadena);
    $cadena = str_ireplace("<script type", "", $cadena);
    $cadena = str_ireplace("SELECT * FROM", "", $cadena);
    $cadena = str_ireplace("DELETE FROM", "", $cadena);
    $cadena = str_ireplace("INSERT INTO", "", $cadena);
    $cadena = str_ireplace("DROP TABLE", "", $cadena);
    $cadena = str_ireplace("DROP DATABASE", "", $cadena);
    $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
    $cadena = str_ireplace("SHOW TABLES", "", $cadena);
    $cadena = str_ireplace("SHOW DATABASES", "", $cadena);
    $cadena = str_ireplace("<?php", "", $cadena);
    $cadena = str_ireplace("?>", "", $cadena);
    $cadena = str_ireplace("--", "", $cadena);
    $cadena = str_ireplace("^", "", $cadena);
    $cadena = str_ireplace("<", "", $cadena);
    $cadena = str_ireplace("[", "", $cadena);
    $cadena = str_ireplace("]", "", $cadena);
    $cadena = str_ireplace("==", "", $cadena);
    $cadena = str_ireplace(";", "", $cadena);
    $cadena = str_ireplace("::", "", $cadena);
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    return $cadena;
}


/* EJEMPLO
$texto = "  <script>Hola</script>";
$select = "SELECT * FROM Chau";
echo limpiar_cadena($texto);

echo limpiar_cadena($select);
*/