@extends('layouts/head-login-sala')


@section('Cuerpo')
<section id="hero"></section>


<?php
	echo $extras[0];
?>
<div class="row">
	<div class="col-xl-8">
		<main id="tournament">
			<?php
				echo $fixture;
			?>
		</main>
	</div>
	<div class="col-xl-4">
		<?php
			echo $extras[1];
		?>
	</div>
</div>


@endsection