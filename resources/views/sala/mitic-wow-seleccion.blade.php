@extends('layouts/head-login')


@section('Cuerpo')
<section id="hero"></section>

<div class="container alto-content">
	<div class="row">
		<?php
			echo $tarjetas;
		?>
	</div>
	<?php
		echo $puntajes;
	?>
</div>
@endsection