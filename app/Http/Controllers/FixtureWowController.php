<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partida_wow;
use Illuminate\Support\Facades\DB;

class FixtureWowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $partidas = DB::table('partida_wow')
                ->where("idsala","=",$id)
                ->get();
        $fixture ='';
        $faseP2=0;
        $count=1;
        foreach($partidas as $partida){
            $faseP1=$partida->fase;
            if($faseP1!=$faseP2){
                if($faseP2==0){
                    $fixture.='
                        <ul class="round round-'.$count.'">
                            <li class="spacer">&nbsp;</li>
                        ';
                }
                else{
                    $fixture.='
                        </ul>
                        <ul class="round round-'.$count.'">
                            <li class="spacer">&nbsp;</li>
                        ';
                }
                $count=$count+1;
            }
            $equipo1 = DB::table('equipos_wow')
                ->where("id","=",$partida->idequipo1)
                ->first();
            $equipo2 = DB::table('equipos_wow')
                ->where("id","=",$partida->idequipo2)
                ->first();
            $fixture.='
                <li class="game game-top">'.$equipo1->nombreSEquipo.'<span>0</span></li>
                <a href="'.route('RMytic',$partida->id).'"><li class="game game-spacer">&nbsp;</li><li class="game game-spacer">&nbsp;</li></a></a>
                <li class="game game-bottom ">'.$equipo2->nombreSEquipo.'<span>0</span></li>

                <li class="spacer">&nbsp;</li>
                ';
            $faseP2=$faseP1;
        }
        $fixture.='
            </ul>
            ';
        if($faseP2!=1){
            for($i=($faseP2+1)/2;$i>0;$i--){
                $fixture.='
                    <ul class="round round-'.$count.'">
                    ';
                for($j=0;$j<$i-1;$j++){
                    $fixture.='
                        <li class="spacer">&nbsp;</li>
                        <li class="game game-top"><span></span></li>
                        <li class="game game-spacer">&nbsp;</li><li class="game game-spacer">&nbsp;</li>
                        <li class="game game-bottom "><span></span></li>
                        <li class="spacer">&nbsp;</li>
                        ';
                }
                $fixture.='
                    </ul>
                    ';
                $count=$count+1;
            }

        }


        return view('sala/sala-fixture-wow',compact('fixture'));
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
