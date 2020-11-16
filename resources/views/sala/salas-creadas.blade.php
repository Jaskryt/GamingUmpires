@extends('layouts/head-login-sala')


@section('Cuerpo')
<!DOCTYPE html>
<html>

<body>
  <section id="hero"></section>

  <div class="card text-center">
      <div class="card-header">
        World Of Warcraft Mythic +
    </div>
    <div class="card-body">
        <h5 class="card-title">Panel de Control de Torneos Activos</h5>
      <div class="card">
        <ul class="list-group list-group-flush">
          <li class="list-group-item redisenio-card-border">
            <a href="seleccion-juego">
              <div class="card redisenio-card-center text-white">
                  <img class="card-img redisenio-img" src="imagenes/andy.jpeg" alt="Card image">
                  <div class="card-img-overlay">
                    <h4 class="card-title">Servidores de Nzoth</h4>
                    <p class="card-text text-margin-redisenio">Mythic Dungeon Gaming Umpires</p>
                    <p class="card-text text-danger">Vencimiento del torneo: </p>
                  </div>
              </div>
            </a>
          </li>
          <li class="list-group-item">Torneo 2</li>
        </ul>
      </div>
    </div>
    <div class="card-footer text-muted">
        © Copyright GamingUmpires. All Rights Reserved
    </div>
  </div>

  <section>
  	<h1>Salas Dota 2:</h1>
  	<center>
  		<?php
  				$codigoUS=auth()->id();
  				$salas = DB::table('sala_dota_2')
                        ->where("codigo_Usuario","=",$codigoUS)
                        ->get();?>

                 @foreach ($salas as $indivSala)
                 	 <table><td>
						<!--<tr><input type="hidden" name="numeroSala'.$indivSala->id.'" value="'.$indivSala->id.'"></tr>-->
						<tr><img src="{{$indivSala->logo}}" style="width: 50px; height: 50px;"></tr>
						<tr>{{$indivSala->nombre_Torneo}}</tr>
						<form method="post" action="{{ url('/sala/detalles-partida-dota2/'.$indivSala->id) }}">
								{{ csrf_field() }}
								<button type="submit">ver detalles</button>
						</form>
					</td></table>
                 @endforeach
</center></section>
</body>
</html>
@endsection