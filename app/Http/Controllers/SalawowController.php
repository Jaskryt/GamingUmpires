<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\salaswow;
use App\Models\jugadores_wow;
use App\Models\equipos_wow;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Facades\DB;

class SalawowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("sala/creacion-sala-wow");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //dd($request->all());
                 $salas = DB::table('jugadores_wow')
                        ->where("nickname","=",'sas')
                        ->first();
        request()->validate([
            'logo'=>['max:2000','mimes:jpeg,bmp,png','required'],
         ]);

        $salaswow=new salaswow;
        $salaswow->nombreSala= request('nombreTorneo');
        $archivo;
        $user= auth()->id();
         if($_FILES['logo']['error']>0){
            echo '<script language="javascript">alert("error al cargar el archivos");</script>';
         }else{
            $permitidos= array("image/gif","image/png","image/jpg");
            $limite_kb=10000;
            if(in_array($_FILES['logo']['type'],$permitidos) && $_FILES['logo']['size'] <= $limite_kb*1024){

                $url='C:\laragon\www\ProyectoGulag\public\logos_wow_torneos/'.$user.'/';
                $archivo=$url.$_FILES['logo']['name'];

                if(!file_exists($url)){
                    //babu checa que mi carpeta del proyecto diferente asi que si quieres probar coloca tu carpeta en la linea 44
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
        $salaswow->logo= "../logo_pictures/".$user.'/'.$_FILES['logo']['name'];
        $salaswow->arbitro=$user;
        $salaswow->save();
         for($j=1;$j<=20;$j++){
            for($i=1;$i<=5;$i++){
                $compare = request('nombreEquipo'.$j);
                if($compare!=null){
                    $njugador=request('name'.$j.'_'.$i);
                    $nombresito = DB::table('jugadores_wow')
                        ->where("nickname","=",$njugador)
                        ->first();
                    if($nombresito==null){
                        $jugador=new jugadores_wow;
                        $jugador->nickname= request('name'.$j.'_'.$i);
                        $jugador->save();


                        $nickname = request('nombreEquipo'.$j);
                        if($nickname!=null){
                            $equipos=new equipos_wow;
                            $equipos->nombreSEquipo = $nickname;
                            $njugador=request('name'.$j.'_'.$i);
                            $nuevo = DB::table('jugadores_wow')
                                ->where("nickname","=",$njugador)
                                ->first();
                            $equipos->jugador = $nuevo->id;
                            $equipos->save();
                        }
                    }
                    else{
                        $nickname = request('nombreEquipo'.$j);
                        if($nickname!=null){
                            $equipos=new equipos_wow;
                            $equipos->nombreSEquipo = $nickname;
                            $njugador=request('name'.$j.'_'.$i);
                            $existente = DB::table('jugadores_wow')
                                ->where("nickname","=",$njugador)
                                ->first();
                            $equipos->Jugador = $existente->id;
                            $equipos->save();
                        }
                    }
                }
            }

        }
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
