<!DOCTYPE html>
<html>
  <head>
  	<meta charset="UTF-8">
  	<link rel="icon" type="assets/img/Logo.png" href="assets/img/Logo.png" />
  	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	 
	
	  <!--por medio de la RUTA_URL almacena este en app/configurar.php
	esta es una constante que dejamos por defecto para llegar siempre a la raiz y de ahi entrar
	a nuestras carpetas de estilos u otras necesitades de public -->
	<!-- Estilos de nustro boostrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"> 
	<!-- Cargamos los estilos de nustro js datatable -->
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css"/>	
	<!-- Cargamos las librerias de estilo de nuestros iconos -->
	<link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.min.css">
	<!-- Cargamos nuestros estilos de ultimos para que sean los ultimos cambios que tome -->
	<link rel="stylesheet" type="text/css" href="assets/css/Misestilos.css">	
	<!-- jquery invocaciones -->
	<!-- El jquery siempre debe ir de primero por las interaciones con otros diseños -->
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<!-- estilos boostrap siempre deben ir debajo del jquery -->
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<!-- Libreria para cargar el estilo de bisqueda de las tablas -->
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
	<!-- Esta libreria es la que nos hace cargar los iconos de fontawesome -->
	<script type="text/javascript" src="assets/js/all.js"></script>	
	<!-- Se cargar nuestros propias funciones js -->
	<script type="text/javascript" src="assets/js/main.js"></script>

	<!--por medio de la RUTA_URL almacena este en app/configurar.php
	esta es una constante que dejamos por defecto para llegar siempre a la raiz y de ahi entrar
	a nuestras carpetas de estilos u otras necesitades de public -->	
	
 
    <title><?=NombreApp;?></title>
    
  </head>
  <body>
  	<!-- contenedor de todo el body para el grid -->
  	<div class="contenedor mt-4">