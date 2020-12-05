<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\salaswow;

class SalasCreadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arbitrowow=auth()->id();
        $salaswow = DB::table('salaswow')
            ->where("arbitro","=",$arbitrowow)
            ->get();

            $li ='';
            foreach($salaswow as $lista){
              $li.='
               <li class="list-group-item redisenio-card-border">
                <a href="'.route('RFixture',$lista->id).'">
                  <div class="row redisenio-card-center">
                    <div class="col-xl-3 redisenio-img-content">
                      <img class="redisenio-img" src="'.$lista->logo.'" alt="Card image">
                    </div>
                    <div class="col-xl-6 align-self-center text-center">
                      <div class="row">
                        <div class="mx-auto">
                          <h4 class="texto-card">'.$lista->nombreSala.'</h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="mx-auto">
                          <p class="card-text text-danger">Vencimiento del torneo: </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 align-self-center text-center">
                      <div class="mx-auto">
                        <button class="btn btn-dark texto-card">Borrar Torneo</button>
                      </div>
                    </div>
                  </div>
                </a>
              </li><br>
              ';
          }


        $arbitrodota2=auth()->id();
        $salas = DB::table('sala_dota_2')
                ->where("codigo_Usuario","=",$arbitrodota2)
                ->get();
            $li2 ='';
            foreach($salas as $indivSala){
                $li2.='
                   <li class="list-group-item redisenio-card-border">
                    <a href="seleccion-juego">
                      <div class="row redisenio-card-center">
                        <div class="col-xl-3 redisenio-img-content">
                          <img class="redisenio-img" src="'.$indivSala->logo.'" alt="Card image">
                        </div>
                        <div class="col-xl-6 align-self-center text-center">
                          <div class="row">
                            <div class="mx-auto">
                              <h4 class="texto-card">'.$indivSala->nombre_Torneo.'</h4>
                            </div>
                          </div>
                          <div class="row">
                            <div class="mx-auto">
                              <p class="card-text text-danger">Vencimiento del torneo: </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 align-self-center text-center">
                          <div class="mx-auto">
                          <form method="post" action="'.url("/sala/detalles-partida-dota2/".$indivSala->id).'">
                            '.csrf_field().'
                            <button type="submit" class="btn btn-dark texto-card">Ver Detalles</button></form>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li><br>
                  ';
            }


        return view('sala/salas-creadas',compact('li'),compact('li2'));
    }




public function search(Request $request){
    if($request){

        $var = $request->get('selectGame');
        $li4 = '';
        $li3 = '';
        if($var == 'D2'){
          $li4 = 'DOTA 2';
          $query = Request('searchText');
          $torneo =DB::table('sala_dota_2')->where('id','=',$query)->first();
          if(isset($torneo)){
            $li3.='
                   <li class="list-group-item redisenio-card-border">
                    <a href="seleccion-juego">
                      <div class="row redisenio-card-center">
                        <div class="col-xl-3 redisenio-img-content">
                          <img class="redisenio-img" src="'.$torneo->logo.'" alt="Card image">
                        </div>
                        <div class="col-xl-6 align-self-center text-center">
                          <div class="row">
                            <div class="mx-auto">
                              <h4 class="texto-card">'.$torneo->nombre_Torneo.'</h4>
                            </div>
                          </div>
                          <div class="row">
                            <div class="mx-auto">
                              <p class="card-text text-danger">Vencimiento del torneo: </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 align-self-center text-center">
                          <div class="mx-auto">
                          <form method="post" action="'.url("/sala/detalles-partida-dota2/".$torneo->id).'">
                            '.csrf_field().'
                            <button type="submit" class="btn btn-dark texto-card">Ver Detalles</button></form>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li><br>
                  ';
          }
          else{
            $li3 = 'No existe el Torneo o la ID es incorrecta';
          }
        }
        if($var == 'WOW'){
          $li4 = $var;
          $query = Request('searchText');
          $torneo =DB::table('salaswow')->where('id','=',$query)->first();
          if(isset($torneo)){
            $li3.='
                   <li class="list-group-item redisenio-card-border">
                    <a href="seleccion-juego">
                      <div class="row redisenio-card-center">
                        <div class="col-xl-3 redisenio-img-content">
                          <img class="redisenio-img" src="'.$torneo->logo.'" alt="Card image">
                        </div>
                        <div class="col-xl-6 align-self-center text-center">
                          <div class="row">
                            <div class="mx-auto">
                              <h4 class="texto-card">'.$torneo->nombre_Torneo.'</h4>
                            </div>
                          </div>
                          <div class="row">
                            <div class="mx-auto">
                              <p class="card-text text-danger">Vencimiento del torneo: </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 align-self-center text-center">
                          <div class="mx-auto">
                          <form method="post" action="'.url("/sala/detalles-partida-dota2/".$torneo->id).'">
                            '.csrf_field().'
                            <button type="submit" class="btn btn-dark texto-card">Ver Detalles</button></form>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li><br>
                  ';
                }
                else{
                  $li3 = 'No existe el Torneo o la ID es incorrecta';
                }
        }
        return view('/buscaSala',compact('li3'),compact('li4'));

    }

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
