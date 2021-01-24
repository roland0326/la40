<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>

			<!-- Contenedor para todo el contenido de la aplicacion -->
				<ol class="breadcrumb miga-pan">
					<li class="breadcrumb-item ">
					  <a href="index.php?c=configuracion&a=loadconfiguracion">Configuracion</a>
					</li>
					<li class="breadcrumb-item active"><?=NombreApp;?></li>
				</ol>
				<header class="header_menu">
					<div class="menu_bar">
						<a href="#" class="bt-menu"><i class="fas fa-bars"></i>Configuracion</a>
					</div>
					<nav class="nav_menu">
						<ul>
							<li class="submenu">
								<a href="#"><i class="fas fa-ellipsis-v">									
									</i>Administracion<i class="fas fa-caret-down caret"></i>
								</a>								
								<ul class="children">
									<li><a href="#">Usuarios</a></li>	
									<li><a href="#">Asignación de perfiles</a></li>								

								</ul>							
							</li>
							<li>
								<a href="#">
									<i class="fas fa-ellipsis-v"></i>Informes</i>
								</a>
								
								
							</li>
							<li class="submenu">
								<a href="#">
									<i class="fas fa-ellipsis-v"></i>Maestros<i class="fas fa-caret-down caret"></i>
								</a>
                                								
								<ul class="children">
										<li><a href="index.php?c=configuracion&a=loadCiudad">Ciudad</a></li>
										<li><a href="index.php?c=configuracion&a=loadEmpresa">Empresa</a></li>
										<li><a href="#">Formularios</a></li>
										<li><a href="index.php?c=configuracion&a=loadPais">País</a></li>
										<li><a href="index.php?c=configuracion&a=loadTipodoc">Tipo de documento</a></li>

								</ul>							
							</li>
							<li>
								<a href="#"><i class="fas fa-ellipsis-v"></i>Procesos
								</a>
								
							</li>
							<li><a href="#"><i class="fas fa-ellipsis-v"></i>Especiales</a></li>
						</ul>
					</nav>
				</header>
<?php 
	require_once 'views/inc/footer.php';
?>