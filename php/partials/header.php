<!-- HEADER -->
<header>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <div class="container-menu flex flex-column">
        <div class="container-menu-title flex">
            <h1>Menu</h1>
        </div>
        <div class="container-menu-links flex flex-column">
                <div class="contenedor-menu">
                        <a href="#" class="btn-menu">Menu<i class="icono fa fa-bars"></i></a>                
                        <?php
                        ?>
                        <ul class="menu">
                            <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './main.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/main.php'; ?>">Inicio</a></li>
                            <li><a href="#">Conductores<span class="icono derecha fontawesome-caret-down"></span></a>
                                <ul>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/conductores/conductores.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/conductores/conductores.php'; ?>">Altas</a></li>
                                    <li><a href=<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/conductores/eliminarConductores.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/conductores/eliminarConductores.php'; ?>>Bajas</a></li>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/conductores/modificarConductores.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/conductores/modificarConductores.php'; ?>">Modificaciones</a></li>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/conductores/verConductores.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/conductores/verConductores.php'; ?>">Ver</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/licencias/licencias.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/licencias/licencias.php'; ?>">Licencias</a></li>
                            <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/multas/multas.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/multas/multas.php'; ?>">Multas</a></li>
                            <li><a href="#">Propietarios<span class="icono derecha fontawesome-caret-down"></span></a>
                                <ul>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/propietarios/propietarios.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/propietarios/propietarios.php'; ?>">Altas</a></li>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/propietarios/eliminarPropietarios.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/propietarios/eliminarPropietarios.php'; ?>">Bajas</a></li>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/propietarios/modificarPropietarios.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/propietarios/modificarPropietarios.php'; ?>">Modificaciones</a></li>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/propietarios/verPropietarios.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/propietarios/verPropietarios.php'; ?>">Ver</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/reportes/reportes.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/reportes/reportes.php'; ?>">Reportes</a></li>
                            <li><a href="#">Vehículos<span class="icono derecha fontawesome-caret-down"></span></a>
                                <ul>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/vehiculos/vehiculos.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/vehiculos/vehiculos.php'; ?>">Altas</a></li>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/vehiculos/eliminarVehiculos.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/vehiculos/eliminarVehiculos.php'; ?>">Bajas</a></li>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/vehiculos/modificarVehiculos.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/vehiculos/modificarVehiculos.php'; ?>">Modificaciones</a></li>
                                    <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/vehiculos/verVehiculos.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/vehiculos/verVehiculos.php'; ?>">Ver</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/verificaciones/verificaciones.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/verificaciones/verificaciones.php'; ?>">Verificaciones</a></li>
                        </ul>
                    </div>
        </div>
        <div class="container-menu-logout flex">
            <a href="<?php echo count(explode('/', $_SERVER['REQUEST_URI'])) == 3 ? './php/logout.php' : '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/php/logout.php'; ?>">Cerrar Sesión</a> 
        </div>
    </div>
</header>
<!-- HEADER -->