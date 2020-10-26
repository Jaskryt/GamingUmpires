@extends('layouts/head-login-sala')


@section('Cuerpo')
<!DOCTYPE html>
<html>
<head>
    <link href="../css/style-sala.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
</head>
<body>
<section id="hero"></section>  
<section id="seleccion-juego">
	  	<center>
	  	<br><br><br><h1 id="titulo">Seleccione un juego para la creacion de la sala</h1>
 		<a href="/creacion-sala-wow"><img id="imagen_redonda"  src="../imagenes/wowlogo.jpg" ></a>
 		<a href="/creacion-sala-dota2"><img id="imagen_redonda"   src="../imagenes/dota2logo.jpg"></a>
  		</center>
</section>
</body>
</html>
@endsection