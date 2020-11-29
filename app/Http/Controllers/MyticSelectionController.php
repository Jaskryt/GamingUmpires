<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;

class MyticSelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$request = Http::get('https://us.api.blizzard.com/data/wow/mythic-keystone/dungeon/ndex?namespace=dynamic-us&locale=es_MX&access_token=USUYU4qlDvKGwRG4yz2viskID4d0Z1PNCf');
        //$request = Http::withBasicAuth('bb023700565c406fb01a3655af82b655','5hJAT58WiOkXRUbZYs7iAxsZJWgFzR56')->get('https://us.api.blizzard.com/data/wow/mythic-keystone/dungeon/ndex?namespace=dynamic-us&locale=es_MX');
        $params = array(
            'grant_type' => 'client_credentials'
        );
        $tokenUri = 'https://us.battle.net/oauth/token';

        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_USERPWD, 'bb023700565c406fb01a3655af82b655' . ":" . '5hJAT58WiOkXRUbZYs7iAxsZJWgFzR56' );
        curl_setopt( $ch, CURLOPT_URL, $tokenUri );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $response = curl_exec( $ch );
        curl_close( $ch );

        $accessTokenResponse = json_decode( $response, true );

        if ( isset( $accessTokenResponse['access_token'] ) ) { // we have access token
            $status = 'ok';
            $message = 'New access token save and ready for use.';

        } else { // no access token
            $status = 'fail';
            $message = 'Something went wrong trying to get an access token.';
        }

        $accessToken =  array(
            'status' => $status,
            'message' => $message,
            'raw_response' => $accessTokenResponse
        );
        $tokkenWOW=$accessTokenResponse['access_token'];
        $expansion=499;//shadowlands
        $request = Http::GET(
            'https://us.api.blizzard.com/data/wow/journal-expansion/'.$expansion.'?namespace=static-us&locale=es_MX&access_token='.$tokkenWOW
        );
        $dungeons = json_decode( $request, true );
        $tarjetas='';
        $fases = count($dungeons["dungeons"]);
        $arraySorteado=array_rand($dungeons["dungeons"],$fases);
        shuffle($arraySorteado);
        $dung1=$dungeons["dungeons"];
        for($i=0;$i<3;$i++){
            $dung2 = $dung1[$arraySorteado[$i]];
            $requestIMG = Http::GET(
                'https://us.api.blizzard.com/data/wow/media/journal-instance/'.$dung2["id"].'?namespace=static-us&locale=es_MX&access_token='.$tokkenWOW
            );
            $tarjetas.='
                    <div class="col-xl-4">
                        <h5>'.$dung2["name"].'</h5>
                    ';
            $wow = json_decode( $requestIMG , true );
            foreach ($wow["assets"] as $img) {
                $tarjetas.='
                            <img src="'.$img["value"].'" class="img-mityc-redisenio">
                        </div>
                        ';

                 //<a href="'.route('RMytic',$partida->id).'">
            }
        }
        //dd($temp1[5]);
        return view("sala/mitic-wow-seleccion",compact('tarjetas'));
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
