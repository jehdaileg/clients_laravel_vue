<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if(request('q')){

            $clients = Client::where('nom', 'like', '%' .request('q'). '%')->get();

            return response()->json($clients);

        }else 
        {

            $clients = Client::all();

            return response()->json($clients);
        }

       /* $clients = Client::all();

        return response()->json($clients);  */
 
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

        $client = Client::create($request->all());

        if($client)
        {

            $clients = Client::all();

            return response()->json($clients);
        }
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

        $client = Client::find($id);

        return response()->json($client);
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

        $client = Client::find($id);

        $client->nom = request('nom');

        $client->prenom = request('prenom');

        $client->nationalite = request('nationalite');

        $client->email = request('email');

        $client->entreprise = request('entreprise');

        $client->save();

        if($client){

            $clients = Client::all();

            return response()->json($clients);
        }
        else {

            return response()->json(['error'=>'Erreur côté serveur!']);
        }
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

        $client = Client::find($id);

        if($client->delete())
        {
            $clients = Client::all();

            return response()->json($clients);
        }
        else 
        {
            return response()->json(['error'=>'Problème côté serveur']);
        }
    }

    /* refresh and print fresh datas */

    public function refresh()

    {

        $clients = Client::orderBy('created_at', 'DESC')->paginate(8);

        return response()->json($clients);
    }
}
