@extends('layouts/head-login-sala')


@section('Cuerpo')
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
</head>
<body>
<section id="hero"></section> 
<section id="creacion-equipos">
	<center>
		<h1 class="titulo">Configure Los Equipos</h1>
		<form method="post" action="{{ route('add-Model-Equipos') }}" enctype="multipart/form-data">
		@csrf
			<div class="container-fluid creacion-sala table-responsive">
			<table class="table">
			 <?php

			  echo '<input type="hidden" value="'.$sala['codigo_Usuario'].'" name="codigo_Usuario">';
			  echo '<input type="hidden" value="'.$sala['nombre_Torneo'].'" name="nombre_Torneo">';
			  echo '<input type="hidden" value="'.$sala['logo'].'" name="logo">';
			  echo '<input type="hidden" value="'.$sala['tipo_Eliminacion'].'" name="tipo_Eliminacion">';
			  echo '<input type="hidden" value="'.$sala['modo_Juego'].'" name="modo_Juego">';
			  echo '<input type="hidden" value="'.$sala['numero_Equipos'].'" name="numero_Equipos">';
			  echo '<input type="hidden" value="'.$sala['equipo_ganador'].'" name="equipo_ganador">';

			  for ($i=0; $i < $sala['numero_Equipos'] ; $i+=4) { 
			  $teams= array(0,1,2,3,4);
			  $tabla_equipos= 	
			       '
			       <tr>
			    		 <th><input type="text" class="cabezera" name="equipo'.($teams[1]+$i).'"  value="equipo'.($teams[1]+$i).'" required></th>
				   		 <th><input type="text" class="cabezera" name="equipo'.($teams[2]+$i).'"  value="equipo'.($teams[2]+$i).'" required></th>
				    	 <th><input type="text" class="cabezera" name="equipo'.($teams[3]+$i).'"  value="equipo'.($teams[3]+$i).'" required></th>
			    		 <th><input type="text" class="cabezera" name="equipo'.($teams[4]+$i).'"  value="equipo'.($teams[4]+$i).'" required></th>
			 	    </tr>
			        <tr>
			  			 <td><input type="text" class="contenido" name="player'.($teams[1]+$i).'1" value="player'.($teams[1]+$i).'1" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[2]+$i).'1" value="player'.($teams[2]+$i).'1" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[3]+$i).'1" value="player'.($teams[3]+$i).'1" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[4]+$i).'1" value="player'.($teams[4]+$i).'1" required></td>
			  		</tr>
			 		<tr>
			    		 <td><input type="text" class="contenido" name="player'.($teams[1]+$i).'2" value="player'.($teams[1]+$i).'2" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[2]+$i).'2" value="player'.($teams[2]+$i).'2" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[3]+$i).'2" value="player'.($teams[3]+$i).'2" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[4]+$i).'2" value="player'.($teams[4]+$i).'2" required></td>
			  		</tr>
			  		<tr>
			    		 <td><input type="text" class="contenido" name="player'.($teams[1]+$i).'3" value="player'.($teams[1]+$i).'3" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[2]+$i).'3" value="player'.($teams[2]+$i).'3" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[3]+$i).'3" value="player'.($teams[3]+$i).'3" required></td>
			   		     <td><input type="text" class="contenido" name="player'.($teams[4]+$i).'3" value="player'.($teams[4]+$i).'3" required></td>
			  		</tr>
			  		<tr>
			    		 <td><input type="text" class="contenido" name="player'.($teams[1]+$i).'4" value="player'.($teams[1]+$i).'4" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[2]+$i).'4" value="player'.($teams[2]+$i).'4" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[3]+$i).'4" value="player'.($teams[3]+$i).'4" required></td>
			    		 <td><input type="text" class="contenido" name="player'.($teams[4]+$i).'4" value="player'.($teams[4]+$i).'4" required></td>
			  		</tr>
			        <tr>
			   			 <td><input type="text" class="contenido" name="player'.($teams[1]+$i).'5" value="player'.($teams[1]+$i).'5" required></td>
			   			 <td><input type="text" class="contenido" name="player'.($teams[2]+$i).'5" value="player'.($teams[2]+$i).'5" required></td>
			   			 <td><input type="text" class="contenido" name="player'.($teams[3]+$i).'5" value="player'.($teams[3]+$i).'5" required></td>
			   			 <td><input type="text" class="contenido" name="player'.($teams[4]+$i).'5" value="player'.($teams[4]+$i).'5" required></td>
			        </tr>
			        <tr>
			   			 <td><br><br></td>
			   			 <td><br><br></td>
			   			 <td><br><br></td>
			   			 <td><br><br></td>
			        </tr>';

			        echo $tabla_equipos;
			        }
			    ?>
				</table>
			</div>
				<button class="buton">continuar</button>

		</form>
	</center>
</section>
</body>
</html>


<style type="text/css">
		.creacion-sala{
			background-color: black;
			width: 100%;
			height: 100vh;
			background-size: cover;
		}
		@font-face{
			font-family: 'general';
			src: url(../fuentes/Prisma.otf);
		}

		.letra{
			font-family: 'general';
			background-color: #44D62C;
			margin-top: 25px;
		}
		.cabezera{
			font-family: 'general';
			width: 200px;
			height: 50px;
			border:10px solid #0d7051;
			background-color: #49c9a1;
			text-align: center;

		}
		.contenido{
			font-family: 'general';
			width: 200px;
			height: 50px;
			border:10px solid #5bd4ae;
			background-color: #aafaf2;
			text-align: center;

		}
		.titulo{
			font-family: 'general';
			background-color: #44D62C;
			height: 70px;
			border-top: 100px;
		}

		.buton{
			background-color: #44D62C;
			font-family: 'general';
			height: 50px;
			border-radius: 10px;
		}
		.buton:hover {
			  background-color: red;
		}

</style>