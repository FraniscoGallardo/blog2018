<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/config.inc.php';

Conexion::abrir_conexion();
$total_usuarioss = RepositorioUsuario::obtener_numero_usuarios(Conexion::obtener_conexion());

?>

<nav class="navbar navbar-default navbar-static-top" >
    <div class="container">
        <div class="navbar-header">
            <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Este boton despliega la barra de navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SERVIDOR ?>"> Sitios de Encuestas</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <?php 
                if(!ControlSesion::sesion_inicada())
                {
                    ?>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo RUTA_ENTRADAS ?>"><i class="fa fa-inbox" aria-hidden="true"></i> Entradas</a></li>
                <li><a href="<?php echo RUTA_FAVORITOS ?>"><span class=" glyphicon glyphicon-star" aria-hidden="true"></span> Favoritos</a></li>
                <li><a href="<?php echo RUTA_AUTORES ?>"><span class=" glyphicon glyphicon-education" aria-hidden="true"></span> Autores</a></li>
            </ul>
            <?php
            }
            ?>
            <ul class="nav navbar-nav  navbar-right">
                <?php
                if (ControlSesion::sesion_inicada()) {
                    ?>
                    <li>
                        <a href="#">
                            <span class=" glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php echo ' ' . $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>
                      <li>
                        <a href="<?php echo RUTA_GESTOR?>">
                            <span class=" glyphicon glyphicon-dashboard" aria-hidden="true"></span> Gestor
                            
                        </a>
                    </li>
                   
                    <li>
                        <a href="<?php echo RUTA_LOGOUT ?>">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true">Cerrar Sesion</span>
                        </a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="#">
                            <span class=" glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php
                            echo $total_usuarioss;
                            ?>
                        </a>
                    </li>
                    <li><a href="<?php echo RUTA_LOGIN ?>"><span class=" glyphicon glyphicon-log-in" aria-hidden="true"></span> Inicar Sesion</a></li>
                    <li><a href="<?php echo RUTA_REGISTRO ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Registro</a></li>
                </ul>

                <?php
            }
            ?>

        </div>

    </div>
</nav>
