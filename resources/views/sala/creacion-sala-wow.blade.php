@extends('layouts/head-login')


@section('Cuerpo')
<section id="hero"></section>
<form method="POST" action="{{ route('RAñadirTorneo') }}" enctype="multipart/form-data">
	@csrf
	<div class="row card-body">
		<div class="col-xl-2">
			<div class="card">
			  <div class="card-header">
			    Nombre del Torneo:
			  </div>
			  <div class="card-body">
			    <input type="text" name="nombreTorneo" value="{{ old('nombreTorneo') }}">
			    {{ $errors->first('nombreTorneo') }}<br>
			  </div>
			</div>
		</div>
		<div class="col-xl-4">
			<div class="card">
			  <div class="card-header">
			    Seleccione logo del torneo:
			  </div>
			  <div class="card-body">
			  	<input type="file" name="logo" id="logo" accept="image/*" value="{{ old('logo') }}">
			  </div>
			</div>
		</div>
		<div class="col-xl-2"></div>
		<div class="col-xl-2"></div>
		<div class="col-xl-2"></div>
		<div class="col-xl-2"></div>
	</div>
	<div id="card-package" class="card-body">
	  	<div id="card-box1" class="row">
	  			<div id="card1" class="col-xl-2">
				    <div class="card">
				     	<div class="card-body">
					        <h5 class="card-title">Nombre del Equipo 1:</h5>
					        <input class="redisenio-imput-card" type="text" name="nombreEquipo1" value="{{ old('nombreEquipo1') }}">
					        {{ $errors->first('nombreEquipo1') }}<br>
					        <p class="card-text text-margin-redisenio">Integrantes:</p>
					        <input type="text" name="name1_1" value="{{ old('name1_1') }}">
					        <input type="text" name="name1_2" value="{{ old('name1_2') }}">
					        <input type="text" name="name1_3" value="{{ old('name1_3') }}">
					        <input type="text" name="name1_4" value="{{ old('name1_4') }}">
					        <input type="text" name="name1_5" value="{{ old('name1_5') }}">
				     	</div>
				    </div>
				</div>
				<div id="card2" class="col-xl-2">
				    <div class="card">
				     	<div class="card-body">
					        <h5 class="card-title">Nombre del Equipo 2:</h5>
					        <input class="redisenio-imput-card" type="text" name="nombreEquipo2" value="{{ old('nombreEquipo2') }}">
					        {{ $errors->first('nombreEquipo1') }}<br>
					        <p class="card-text text-margin-redisenio">Integrantes:</p>
					        <input type="text" name="name2_1" value="{{ old('name2_1') }}">
					        <input type="text" name="name2_2" value="{{ old('name2_2') }}">
					        <input type="text" name="name2_3" value="{{ old('name2_3') }}">
					        <input type="text" name="name2_4" value="{{ old('name2_4') }}">
					        <input type="text" name="name2_5" value="{{ old('name2_5') }}">
				     	</div>
				    </div>
				</div>
			<div id="cardPlus" class="col-xl-2">
				<div class="card-border-redisenio">
			     	<div class="card-body card-plus-tamanio">
			     			<input type="button" class="btn btn-success" onclick="crearCard()" value="+">
			     			<input type="button" class="btn btn-danger" onclick="eliminarCard()" value="x">
			   		</div>
			   	</div>
			</div>
		</div>
	</div>
	<div>
	<div class="row card-footer text-muted">
		<div class="col-xl-2"></div>
		<div class="col-xl-2"></div>
		<div class="col-xl-1">
    		<button onclick="return Confirmar()" class="btn btn-danger" type="submit">Crear torneo</button><br><br>
    	</div>
    	<div class="col-xl-3">
    		<p id="text-torneo">Iniciar torneo y creacion de fixture.</p>
    	</div>
    	<div class="col-xl-2"></div>
    	<div class="col-xl-2"></div>
    </div>

</form>

@endsection