@extends('layouts/head-login-sala')


@section('Cuerpo')
<!DOCTYPE html>
<html>
<head>
    <link href="../css/style-sala.css" rel="stylesheet">
</head>
<body>
<section id="hero"></section> 
<section id="creacion-sala"> 
	<center>
		<h1>Selecciona las reglas del juego</h1>
		<form method="post" action="{{ route('add-Model-Sala') }}" enctype="multipart/form-data">
				@csrf


		Nombre del torneo <input type="text" name="nombreTorneo" id="nombreTorneo" value="{{ old('nombreTorneo') }}"><br>
		{{ $errors->first('nombreTorneo') }}<br>

		logo: <img src="imagenes/LogoFinal.png" style="width: 200px; height: 200px;" ><br>
	

		elegir <input type="file" name="logo" id="logo" accept="image/*" value="{{ old('logo') }}"><br>
		{{ $errors->first('logo') }}<br>

		tipo de eliminacion: <select name="tipoEliminacion" id="tipoEliminacion" value="{{ old('tipoEliminacion') }}">
  								<option value="BO3">BO3</option>
  								<option value="BO5">BO5</option>
  								<option value="Eliminacion Directa">Eliminacion Directa</option>
							</select><br>
		{{ $errors->first('tipoEliminacion') }}<br>
			
		Modo de juego: <select name="modoJuego" id="modoJuego" value="{{ old('modoJuego') }}">
  								<option value="All pick">All pick</option>
  								<option value="Captain Mode">Captain Mode</option>
  								<option value="Simple Selection">Simple Selection</option>
					  </select>	<br>
		{{ $errors->first('modoJuego') }}<br>

		Numero de equipos: <select name="numeroEquipos" id="numeroEquipos" value="{{ old('numeroEquipos') }}">
  								<option value="4">4</option>
  								<option value="8">8</option>
  								<option value="16">16</option>
					  </select>	<br>
		{{ $errors->first('numeroEquipos') }}<br>

		<button>continuar</button>
		</form>
	</center>
</section>
</body>
</html>
@endsection
