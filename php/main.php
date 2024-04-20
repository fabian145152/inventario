<?php

#Conexiona a la base de datos

function conexion()
{
    $pdo = new PDO('mysql:host=localhost;dbname=inventario', 'root', 'belgrado');
    return $pdo;
}

# Verificar Datos
# Si coincide con la cadena devuelve true, sino false
# Filtra los caracteres que no van

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

# Funcion renombrar fotos
function renombrar_fotos($nombre)
{
    $nombre = str_ireplace(" ", "_", $nombre);
    $nombre = str_ireplace("/", "_", $nombre);
    $nombre = str_ireplace("#", "_", $nombre);
    $nombre = str_ireplace("-", "_", $nombre);
    $nombre = str_ireplace("$", "_", $nombre);
    $nombre = str_ireplace(".", "_", $nombre);
    $nombre = str_ireplace(",", "_", $nombre);
    $nombre = $nombre . "_" . rand(0, 100);    //le agrega al final del nombre un _ y numero aleatorio entre 0 y 100
    return $nombre;
}

# ejemplo
//$foto = "Play Stattion 5 black/edition";
//echo renombrar_fotos($foto);

# Funcion Paginador de tablas #
function paginador_tablas($pagina, $Npaginas, $url, $botones)
{
    $tabla = '<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">';

    if ($pagina <= 1) {
        $tabla .= '
        <a class="pagination-previus href="' . $url . ($pagina - 1) . '" disabled >Anterior</a>
        <ul class="pagination-list">';
    } else {
        $tabla .= '<a class="pagination-previus" href="#">Anterior</a>
        <ul class="pagination-list">
        <li><a class="pagination-link" href="' . $url . '1">1</a></li>
        <li><span class="pagination-ellipsis">&hellip;</span></li>
        ';
    }
    #  conteo de paginas
    $ci = 0;
    for ($i = $pagina; $i <= $Npaginas; $i++) {


        if ($ci >= $botones) {
            break;
        }


        if ($pagina == $i) {
            $tabla .= '
            <li><a class="pagination-link is-current" href="' . $url . $i . '">' . $i . '</a></li>
            ';
        } else {
            $tabla .= '
            <li><a class="pagination-link" href="' . $url . $i . '">' . $i . '</a></li>
            ';
        }
        $ci++;
    }



    if ($pagina == $Npaginas) {
        $tabla .= '
        </ul>
        <a class="pagination-next is-disabed" disabled >Siguiente</a>
        ';
    } else {
        $tabla .= '
        <li><span class="pagination-ellipsis">&hellip;</span></li>
        <li><a class="pagination-link is-current" href="' . $url . $Npaginas . '">' . $Npaginas . '</a></li>
        </ul>
        <a class="pagination-next" href="' . $url($pagina + 1) . '">Siguiente</a>
        ';
    }

    $tabla .= '</nav>';
    return $tabla;
}
