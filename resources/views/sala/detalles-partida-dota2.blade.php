<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
			 $salaDatos = DB::table('sala_dota_2')
                                            ->where("id","=",$id)
                                            ->get();
            //lista de los equipos y encuentros
             $encuentrosDatos = DB::table('encuentros_dota2')
                                            ->where("codigo_Sala","=",$id)
                                            ->get();   
             //convirtiendo el tipo de eliminacion a numero
             $eliminacion=1;
             if($salaDatos[0]->tipo_Eliminacion=='BO3'){
             	$eliminacion=3;
             }elseif ($salaDatos[0]->tipo_Eliminacion=='BO5') {
             	$eliminacion=5;
             }

             //opciones para ver los detalles de una partida
             $options='';
             for ($i=1; $i <=$eliminacion; $i++) { 
             	$options.='<option value="'.$i.'" >partida:'.$i.'</option>';
             }
             
			//fixture de los equipos
					switch ($salaDatos[0]->numero_Equipos) {
						case 4:
						$fixture='
						<table>
						    <tr class="1">
						    	<td><input type="text" name="cuartosFinal1" readonly="readonly"
							 	 id="cuartosFinal1"	value="'.($encuentrosDatos[0]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="2">
						    	<td></td><td><button id="cuartos1vs2">Ver Detalles</button>
								<select id="matchc1vs2">'.$options.'</select></td>
						    	<td></td><td></td><td></td>
						    </tr>
						    <tr class="3">
						    	<td><input type="text" name="cuartosFinal2" readonly="readonly"
						     	 id="cuartosFinal2" value="'.($encuentrosDatos[0]->equipo_2).'"></td>
						    	<td></td>
						    	<td><input type="text" name="semiFinalista1" readonly="readonly" placeholder="Semi-final"
						    	value="'.($encuentrosDatos[2]->equipo_1).'" id="semiFinalista1" ></td>
						    	<td></td><td></td>
						    </tr>
						    <tr class="4">
						    	<td></td><td></td><td></td>
						    	<td><button id="semifinal">Ver Detalles</button>
						    	<select id="matchsf">'.$options.'</select></td></td>
						    	<td><input type="text" name="Ganador"  readonly="readonly" placeholder="Ganador"
						    	value="'.($salaDatos[0]->equipo_Ganador).'" ></td>
						    </tr>
						    <tr class="5">
						    	<td><input type="text" name="cuartosFinal3"  id="cuartosFinal3"
						     	 			value="'.$encuentrosDatos[1]->equipo_1.'"></td>
						    	<td></td><td><input type="text" name="semiFinalista2" readonly="readonly" placeholder="Semi-final" value="'.($encuentrosDatos[2]->equipo_2).'"  id="semiFinalista2"></td>
						    	<td></td><td></td>
						    </tr>
						    <tr class="6">
						    	<td></td><td><button id="cuartos3vs4">Ver Detalles</button>
						    	<select id="matchc3vs4">'.$options.'</select></td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="7">
						    	<td><input type="text" name="cuartosFinal4"  id="cuartosFinal4"
						     	 			value="'.($encuentrosDatos[1]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td>
						    </tr>
						<table>';

							 echo $fixture;
							break;
						case 8:
							 $fixture='
						<table>
						    <tr class="1">
						    	<td><input type="text" name="octavosFinal1" readonly="readonly"
							 	 				value="'.($encuentrosDatos[0]->equipo_1).'"</td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="2">
						    	<td></td><td><button>Ver Detalles</button>
						    	<select id="matcho1vs2">'.$options.'</select></td>
						    	<td><input type="text" name="cuartosFinal1" readonly="readonly" placeholder="Cuartos de Final 1" 
						    	value="'.($encuentrosDatos[4]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="3">
						    	<td><input type="text" name="octavosFinal2" readonly="readonly"
							 	 				value="'.($encuentrosDatos[0]->equipo_2).'"</td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="4">
								<td></td><td></td><td></td><td><button>Ver Detalles</button>
								<select id="matchc1vs2">'.$options.'</select></td>
								<td></td><td></td><td></td>
						    </tr>
						    <tr class="5">
								<td><input type="text" name="octavosFinal3" readonly="readonly"
							 	 				value="'.($encuentrosDatos[1]->equipo_1).'"</td>
								<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="6">
								<td></td><td><button>Ver Detalles</button>
								<select id="matcho3vs4">'.$options.'</select></td>
								<td><input type="text" name="cuartosFinal2" readonly="readonly" placeholder="Cuartos de Final 1" 
								value="'.($encuentrosDatos[4]->equipo_2).'"></td>
								<td></td><td><input type="text" name="semiFinalista1" readonly="readonly" placeholder="Semi-final" 
								value="'.($encuentrosDatos[6]->equipo_1).'"></td>
								<td></td><td></td>
						    </tr>
						    <tr class="7">
								<td><input type="text" name="octavosFinal4" readonly="readonly"
							 	 				value="'.($encuentrosDatos[1]->equipo_2).'"</td>
								<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="8">
						    	<td></td><td></td><td></td><td></td><td></td>
						    	<td><button>Ver Detalles</button>
						    	<select id="matchsf">'.$options.'</select></td>
						    	<td><input type="text" name="Ganador" readonly="readonly" placeholder="Ganador" 
						    	value="'.($salaDatos[0]->equipo_Ganador).'"></td>
						    </tr>
						    <tr class="9">
								<td><input type="text" name="octavosFinal5" readonly="readonly"
							 	 				value="'.($encuentrosDatos[2]->equipo_1).'"</td>
								<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="10">
								<td></td><td><button>Ver Detalles</button>
								<select id="matcho5vs6">'.$options.'</select></td>
								<td><input type="text" name="cuartosFinal3" readonly="readonly" placeholder="Cuartos de Final 2" 
								value="'.($encuentrosDatos[5]->equipo_1).'"></td>
								<td></td><td><input type="text" name="semiFinalista2" readonly="readonly" placeholder="Semi-final"
								value="'.($encuentrosDatos[6]->equipo_2).'" ></td>
								<td></td><td></td>
						    </tr>
						    <tr class="11">
								<td><input type="text" name="octavosFinal6" readonly="readonly"
							 	 				value="'.($encuentrosDatos[2]->equipo_2).'"</td>
								<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="12">
								<td></td><td></td><td></td><td><button>Ver Detalles</button>
								<select id="matchc3vs4">'.$options.'</select></td>
								<td></td><td></td><td></td>
						    </tr>
						    <tr class="13">
								<td><input type="text" name="octavosFinal7" readonly="readonly"
							 	 				value="'.($encuentrosDatos[3]->equipo_1).'"</td>
								<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="14">
								<td></td><td><button>Ver Detalles</button>
								<select id="matcho7vs8">'.$options.'</select></td>
								<td><input type="text" name="cuartosFinal4" readonly="readonly" placeholder="Cuartos de Final 2"
								value="'.($encuentrosDatos[5]->equipo_2).'" ></td>
								<td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="15">
								<td><input type="text" name="octavosFinal8" readonly="readonly"
							 	 				value="'.($encuentrosDatos[3]->equipo_2).'"</td>
								<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						<table>';
							 echo $fixture;
							break;
						case 16:
							  $fixture='
						<table>
						    <tr class="1">
						    	<td><input type="text" name="clasificacion1" readonly="readonly"
							 	 			value="'.($encuentrosDatos[0]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="2">
						    	<td></td><td><button>Ver Detalles</button>
						    	<select id="matchcl1vs2">'.$options.'</select></td>
						    	<td><input type="text" name="octavosFinal1" readonly="readonly" placeholder="Octavos de Final 1"
						    	value="'.($encuentrosDatos[8]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="3">
						    	<td><input type="text" name="clasificacion2" readonly="readonly"
							 	 			value="'.($encuentrosDatos[0]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="4">
						    	<td></td><td></td><td></td>
						    	<td><button>Ver Detalles</button>
						    	<select id="matcho1vs2">'.$options.'</select></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="5">
						    	<td><input type="text" name="clasificacion3" readonly="readonly"
							 	 			value="'.($encuentrosDatos[1]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="6">
						    	<td></td><td><button>Ver Detalles</button>
						    	<select id="matchcl3vs4">'.$options.'</select></td>
						    	<td><input type="text" name="octavosFinal2" readonly="readonly" placeholder="Octavos de Final 1"
						    	value="'.($encuentrosDatos[8]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="7">
						    	<td><input type="text" name="clasificacion4" readonly="readonly"
							 	 			value="'.($encuentrosDatos[1]->equipo_2).'"></td>
						    	<td></td><td></td><td></td>
						    	<td><input type="text" name="cuartosFinal1"  readonly="readonly" placeholder="Cuartos de Final 1" 
						    	value="'.($encuentrosDatos[12]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="8">
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="9">
						    	<td><input type="text" name="clasificacion5" readonly="readonly"
							 	 			value="'.($encuentrosDatos[2]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="10">
						    	<td></td><td><button>Ver Detalles</button>
						    	<select id="matchcl5vs6">'.$options.'</select></td>
						    	<td><input type="text" name="octavosFinal3" readonly="readonly" placeholder="Octavos de Final 2"
						    	value="'.($encuentrosDatos[9]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="11">
						    	<td><input type="text" name="clasificacion6" readonly="readonly"
							 	 			value="'.($encuentrosDatos[2]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td>
						    	<td><button>Ver Detalles</button>
						    	<select id="matchc1vs2">'.$options.'</select></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="12">
						    	<td></td><td></td><td></td>
						    	<td><button>Ver Detalles</button>
						    	<select id="matcho3vs4">'.$options.'</select></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="13">
						    	<td><input type="text" name="clasificacion7" readonly="readonly"
							 	 			value="'.($encuentrosDatos[3]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="14">
						    	<td></td><td><button>Ver Detalles</button>
						    	<select id="matchcl7vs8">'.$options.'</select></td>
						    	<td><input type="text" name="octavosFinal4"  readonly="readonly" placeholder="Octavos de Final 2" value="'.($encuentrosDatos[9]->equipo_2).'"</td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="15">
						    	<td><input type="text" name="clasificacion8" readonly="readonly"
							 	 			value="'.($encuentrosDatos[3]->equipo_2).'"</td>
						    	<td></td><td></td><td></td>
						    	<td><input type="text" name="cuartosFinal2"  readonly="readonly"placeholder="Cuartos de Final 1" 
						    	value="'.($encuentrosDatos[12]->equipo_2).'"></td><td></td>
						    	<td><input type="text" name="semiFinalista1" readonly="readonly" placeholder="Semi-final"
						    	value="'.($encuentrosDatos[14]->equipo_1).'" ></td><td></td><td></td>
						    </tr>
						    <tr class="16">
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    	<td><button>Ver Detalles</button>
						    	<select id="matchsf">'.$options.'</select></td>
						    	<td><input type="text" name="Ganador" readonly="readonly" placeholder="Ganador" 
						    	value="'.($salaDatos[0]->equipo_Ganador).'" ></td>
						    </tr>
						    <tr class="17">
						    	<td><input type="text" name="clasificacion9" readonly="readonly"
							 	 			value="'.($encuentrosDatos[4]->equipo_1).'"></td>
						    	<td></td><td></td><td></td>
						    	<td><input type="text" name="cuartosFinal3"  readonly="readonly"  placeholder="Cuartos de Final 2" 
						    	value="'.($encuentrosDatos[13]->equipo_1).'"></td><td></td>
						    	<td><input type="text" name="semiFinalista2" readonly="readonly"  placeholder="Semi-final" 
						    	value="'.($encuentrosDatos[14]->equipo_2).'"></td><td></td><td></td>
						    </tr>
						    <tr class="18">
						    	<td></td><td><button>Ver Detalles</button>
						    	<select id="matchcl9vs10">'.$options.'</select></td>
						    	<td><input type="text" name="octavosFinal5" readonly="readonly" placeholder="Octavos de Final 3" 
						    	value="'.($encuentrosDatos[10]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="19">
						    	<td><input type="text" name="clasificacion10" readonly="readonly"
							 	 			value="'.($encuentrosDatos[4]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="20">
						    	<td></td><td></td><td></td>
						    	<td><button>Ver Detalles</button>
						    	<select id="matcho5vs6">'.$options.'</select></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="21">
						    	<td><input type="text" name="clasificacion11" readonly="readonly"
							 	 			value="'.($encuentrosDatos[5]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td>
						    	<td><button>Ver Detalles</button>
						    	<select id="matchc3vs4">'.$options.'</select></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="22">
						    	<td></td><td><button>Ver Detalles</button>
						    	<select id="matchcl11vs12">'.$options.'</select></td>
						    	<td><input type="text" name="octavosFinal6" readonly="readonly" placeholder="Octavos de Final 3"
						    	value="'.($encuentrosDatos[10]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="23">
						    	<td><input type="text" name="clasificacion12" readonly="readonly"
							 	 			value="'.($encuentrosDatos[5]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="24">
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="25">
						    	<td><input type="text" name="clasificacion13" readonly="readonly"
							 	 			value="'.($encuentrosDatos[6]->equipo_1).'"></td>
						    	<td></td><td></td><td></td>
						    	<td><input type="text" name="cuartosFinal4" readonly="readonly" placeholder="Cuartos de Final 2" 
						    	value="'.($encuentrosDatos[13]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="26">
						    	<td></td><td><button>Ver Detalles</button>
						    	<select id="matchcl3vs14">'.$options.'</select></td>
						    	<td><input type="text" name="octavosFinal7" readonly="readonly" placeholder="Octavos de Final 4"
						    	value="'.($encuentrosDatos[11]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="27">
						    	<td><input type="text" name="clasificacion14" readonly="readonly"
							 	 			value="'.($encuentrosDatos[6]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="28">
						    	<td></td><td></td><td></td>
						    	<td><button>Ver Detalles</button>
						    	<select id="matcho7vs8">'.$options.'</select></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="29">
						    	<td><input type="text" name="clasificacion15" readonly="readonly"
							 	 			value="'.($encuentrosDatos[7]->equipo_1).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="30">
						    	<td></td><td><button>Ver Detalles</button>
						    	<select id="matchc15vs16">'.$options.'</select></td>
						    	<td><input type="text" name="octavosFinal8" readonly="readonly" placeholder="Octavos de Final 4"
						    	value="'.($encuentrosDatos[11]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						    <tr class="31">
						    	<td><input type="text" name="clasificacion16" readonly="readonly"
							 	 			value="'.($encuentrosDatos[7]->equipo_2).'"></td>
						    	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    </tr>
						<table><br><br><br><br>';
							 echo $fixture;
							break;
					}




	?>
</body>
</html>
<!--script para los botones-->
<script type="text/javascript">
	//cuartos de final 1
	document.getElementById("cuartos1vs2").onclick=function(){
		alert("cuartos1vs2");
	}

	//cuartos de final 2
	document.getElementById("cuartos3vs4").onclick=function(){
		alert("cuartos3vs4");
	}

	//final 
	document.getElementById("semifinal").onclick=function(){
		alert("semifinal");
	}
</script>