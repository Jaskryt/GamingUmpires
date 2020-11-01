@extends('layouts/head-login-sala')


@section('Cuerpo')
<!DOCTYPE html>
<html>

<body>
  <section id="hero"></section>
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