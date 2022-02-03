<?php

if (!isset($_SESSION)) {
    session_start();
}

$_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = 14;
                            $_SESSION["username"] = "adrean130320";
                            $_SESSION["usuario"] = "adrian rodriguez";
                            $_SESSION["timeout"] = time();
                            $_SESSION["role"] = 1;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
date_default_timezone_set('America/Bogota');

require_once('ti.php');
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
ini_set("default_charset", "utf-8");
$conexion=new Conexion();
$base=$conexion->conectar();

// Check if the user is logged in, if not then redirect him to login page
/*if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} */

// Establecer tiempo de vida de la sesión en segundos
//$inactividad = 900;
// Comprobar si $_SESSION["timeout"] está establecida
//if (isset($_SESSION["timeout"])) {
    //Calcular el tiempo de vida de la sesión (TTL = Time To Live)
//    $sessionTTL = time() - $_SESSION["timeout"];
//    if ($sessionTTL > $inactividad) {
//        session_destroy();
//        header("Location: logout.php");
//    } else {
//        $_SESSION["timeout"] = time();
//    }
//}

$user_id = $_SESSION["user_id"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php emptyblock('title') ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <!--  <link rel="stylesheet" href="./css/timeline.css"> -->
    <link href="css/mis_estilos.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-html5-1.6.5/datatables.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
</head>

<body>
    <div class="wrap">
        <div class="jm-loadingpage centrado"> <br> <br> <br> <br> <br> <br> <br> Cargando ...</div>
        <nav class="navbar navbar-default navbar-fixed-top">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <a class="navbar-brand" href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/crud_empresa">
                        <img alt="Brand" src="img/logo_avanzo.jpeg" class="menu_nav">
                    </a>

                    <?php  echo crear_menu(0, $base, $user_id); ?>
                </ul>
                <ul class="nav navbar-inverse navbar-right navbar-inverse">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION["usuario"] ?><span class="caret">
                            </span></a>
                        <ul class="dropdown-menu">
                            <li><a href="reset-password.php">Cambiar contraseña</a></li>
                            <li><a href="logout.php">Salir del sistema</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <div id="contenedor" class="container-fluid">
            <?php emptyblock('titulo-pagina') ?>
            <div id='contenido' class="col-md-12">
                <div>
                    <?php emptyblock('contenido') ?>
                </div>
                <div>
                    <?php emptyblock('mensaje') ?>
                </div>
            </div>
            <div>
                <?php emptyblock('totales') ?>
            </div>
            <br />
            <div id="footer" class="footer navbar-fixed-bottom">
                <h5 class="centrado">Avanzo © 2021. Departamento Tecnología. </h5>
            </div>
        </div>

        <script src=<?php $_SERVER["DOCUMENT_ROOT"]?>"/crud_empresa/libs/jquery.min.js" charset="utf-8"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-html5-1.6.5/datatables.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>



       <script src="js/funciones.js"></script>
        <script>
            $(document).ready(function() {
                $(".jm-loadingpage").fadeOut("slow");
            });
        </script>
        <?php emptyblock('script') ?>
    </div>
</body>

</html>


<?php
function crear_menu($id_superior, $conexionl, $user_id)
{
    $menu = ""; // Vaciamos la variable menú
    $sql = "SELECT *
            FROM menus m
            join menu_permisos mp on mp.menu_id= m.menu_id
            where mp.user_id = :user_id and m.men_menu_superior = :id_superior
            order by m.men_orden";
    $resultado = $conexionl->prepare($sql);
    $resultado->bindValue(":user_id",$user_id);
    $resultado->bindValue(":id_superior",$id_superior);
    $resultado->execute();

    while ($row=$resultado->fetch(PDO::FETCH_OBJ)) {



        if ($id_superior == 0) {
            $menu .= "<li class='dropdown'><a href='" . $row->men_ruta . "'class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>" . $row->men_nombre . "<span class='caret'></span> </a>";
        } else {
            $menu .= "<li><a href='" . $row->men_ruta . "'>" . $row->men_nombre . "</a>";
        }
        $menu .= "<ul class='dropdown-menu'>" . crear_menu($row->menu_id, $conexionl, $user_id) . "</ul>"; //LLamada recursiva para generar todos los niveles del menú

        $menu .= "</li>";
    }

    return $menu;
}
?>
