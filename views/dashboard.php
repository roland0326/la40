<?php require_once 'inc/main.php';//contiene las otras partes de los estructura 
$conexion= new database;?>


			<!-- Contenedor para todo el contenido de la aplicacion -->
				<ol class="breadcrumb miga-pan">
					<li class="breadcrumb-item active"><?=NombreApp?></li>
				</ol>
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-md-4 text-center">
							<div class="fondo-carpeta">
								<a href="index.php?c=productos&a=LoadContenedorProductos">									
									<img src="assets/img/productos.svg" alt="folder" >
								</a>
								<p class="text-center"><strong>Productos</strong></p>
							</div>
						</div>	
						<!--Contemedor de clientes -->
                        <div class="col-md-4 text-center">
							<div class="fondo-carpeta">
								<a href="index.php?c=clientes&a=LoadContenedorClientes">									
									<img src="assets/img/Clientes.svg" alt="folder" >
								</a>
								<p class="text-center"><strong>Clientes</strong></p>
							</div>
						</div>	

                         <div class="col-md-4 text-center">
							<div class="fondo-carpeta">
								<a href="index.php?c=compras&a=LoadContenedor">									
									<img src="assets/img/Compras.svg" alt="folder" >
								</a>
								<p class="text-center"><strong>Compras</strong></p>
							</div>
						</div>	
						
                         <div class="col-md-4 text-center">
							<div class="fondo-carpeta">
								<a href="index.php?c=ventas&a=LoadContVentas">								
									<img src="assets/img/Facturacion.svg" alt="folder" >
								</a>
								<p class="text-center"><strong>Ventas</strong></p>
							</div>
						</div>				
						
					</div>
				</div>
<?php 
	require_once 'inc/footer.php';
?>