<?php require_once 'views/inc/main.php';//contiene las otras partes de los estructura ?>

			<!-- Contenedor para todo el contenido de la aplicacion -->
				<ol class="breadcrumb miga-pan">
					<li class="breadcrumb-item ">
					  <a href="index.php?c=clientes&a=LoadContenedorClientes">Modulo Clientes</a>
					</li>
					<li class="breadcrumb-item active"><?=NombreApp;?></li>
				</ol>
				<header class="header_menu">
					<div class="menu_bar">
						<a href="#" class="bt-menu"><i class="fas fa-bars"></i>Modulo Clientes</a>
					</div>
					<nav class="nav_menu">
						<ul>
							<li class="submenu">
								<a href="#"><i class="fas fa-ellipsis-v">									
									</i>Documentos<i class="fas fa-caret-down caret"></i>
								</a>
                                <ul class="children">
                                    <li>
                                        <a href="index.php?c=clientes&a=loadCliente">Clientes</a>
                                    </li>
                                </ul>													
							</li>
							<li>
								<a href="#">
									<i class="fas fa-ellipsis-v"></i>Informes</i>
								</a>
								
								
							</li>
							<li class="submenu">
								<a href="#">
									<i class="fas fa-ellipsis-v"></i>Maestros
								</a>
								
								<ul class="children">
																	
								</ul>                              							
							</li>
							<li>
								<a href="#"><i class="fas fa-ellipsis-v"></i>Procesos</a>								
							</li>
							<li><a href="#"><i class="fas fa-ellipsis-v"></i>Especiales</a></li>
						</ul>
					</nav>
				</header>
<?php 
	require_once 'views/inc/footer.php';
?>