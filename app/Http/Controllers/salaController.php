<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sala;
use App\Models\equipos_dota_2;
use App\Models\jugadores_dota_2;
use Illuminate\Support\Facades\DB;

class salaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //validamos los datos
            request()->validate([
            'nombreTorneo'=>'required',
            'logo'=>['max:2000','mimes:jpeg,bmp,png','required'],
            'tipoEliminacion'=>'required',
            'modoJuego'=>'required',
            'numeroEquipos'=>'required'
         ]);

        //codigo del usuario
        $codigoUS=auth()->id();
        //para la imagen 
         
         $archivo;

         if($_FILES['logo']['error']>0){    
            echo '<script language="javascript">alert("error al cargar el archivos");</script>';
         }else{
            $permitidos= array("image/gif","image/png","image/jpg");
            $limite_kb=10000;
            if(in_array($_FILES['logo']['type'],$permitidos) && $_FILES['logo']['size'] <= $limite_kb*1024){
                $url='C:\laragon\www\GamingUmpires\public\logo_pictures/'.$codigoUS.'/';
                $archivo=$url.$_FILES['logo']['name'];

                if(!file_exists($url)){
                    mkdir($url);
                }

                if(!file_exists($archivo)){
                    $resultado=@move_uploaded_file($_FILES['logo']['tmp_name'],$archivo);
                    if($resultado){
                         echo '<script language="javascript">alert("guardado");</script>';
                    }else{
                         echo '<script language="javascript">alert("no guadado");</script>';
                    }
                }
            }else{
                 echo '<script language="javascript">alert("tamaño o formato invalido");</script>';
            }
         }

         //creamos nuestro objeto sala y 
         $sala=new sala;
         $sala->codigo_Usuario=$codigoUS;
         $sala->nombre_Torneo= request('nombreTorneo');
         $sala->logo= "../logo_pictures/".$codigoUS.'/'.$_FILES['logo']['name'];
         $sala->tipo_Eliminacion= request('tipoEliminacion');
         $sala->modo_Juego= request('modoJuego');
         $sala->numero_Equipos= request('numeroEquipos');
         //el equipo ganador no existe aun
         $sala->equipo_ganador= "por concluir";

         return View('sala/creacion-equipos-sala-dota2')->with('sala',$sala);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //almacenando la sala en la BD
        $sala=new sala;
        $sala->codigo_Usuario=$request->codigo_Usuario;
        $sala->nombre_Torneo= $request->nombre_Torneo;
        $sala->logo= $request->logo;
        $sala->tipo_Eliminacion=$request->tipo_Eliminacion; 
        $sala->modo_Juego= $request->modo_Juego;
        $sala->numero_Equipos= $request->numero_Equipos;
        $sala->equipo_ganador= $request->equipo_ganador;
        $sala->save();

        //almacenando los equipos en la BD
        //recibiendo la ultima tabla creada anteriormente
         $salas = DB::table('sala_dota_2')
                        ->where("codigo_Usuario","=",$request->codigo_Usuario)
                        ->latest('id')
                        ->first();

        //guardando el id de la ultima tabla
         $cont=true;
         $codigoSala;
         foreach ($salas as $pr) {
             if($cont){
                $codigoSala=$pr;
                $cont=false;
             }
         }

         //insertando los equipos en la BD
        //insertando los jugadores en la BD
        $listaEquipos = explode("," , $_POST['arrayEquipos']);
        $listaJugadores = explode("," , $_POST['arrayJugadores']);
        $contArray=0;
        for ($i=1; $i <= $sala['numero_Equipos'] ; $i++){
                $equipo=new equipos_dota_2;
                $equipo->codigo_Sala=$codigoSala;
                $equipo->nombre_Equipo=$listaEquipos[$i-1];
                $equipo->save();
                for ($j=1; $j <=5 ; $j++) { 
                        $jugador=new jugadores_dota_2;
                        //recibiendo la ultima tabla creada anteriormente
                        $equipos = DB::table('equipos_dota_2')
                                    ->where("codigo_Sala","=",$codigoSala)
                                    ->latest('id')
                                    ->first();
                        //guardando el id de la ultima tabla de equipos
                        $cont=true;
                        $codigoEquipo;
                         foreach ($equipos as $pr) {
                             if($cont){
                              $codigoEquipo=$pr;
                             $cont=false;
                            }
                        }
                        $jugador->codigo_Equipo=$codigoEquipo;
                        $jugador->nickname=$listaJugadores[$contArray];
                        $jugador->save();
                        $contArray++;
                }
         }

        
         return view('/sala/salas-creadas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
