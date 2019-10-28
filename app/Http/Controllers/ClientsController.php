<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\Http\Requests\clientRequest;
class ClientsController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    //lister les clients
   public function index(){
    $listclient=Clients::all();
    return view ('clients.index',['clients'=>$listclient]);
}
//afficher le formulaire de creation
public function create(){
 
 return view ('clients.create');
}
//enregistrer un client
public function store(clientRequest $request){
 $client=new Clients();

  $client->civility=$request->input('civilite');
  $client->nom=$request->input('nom');
  
  
  $client->prenom=$request->input('prenom');
  $client->age=$request->input('age');
  $client->email=$request->input('email');

  $client->telephone=$request->input('tele');
  $client->adresse=$request->input('adr');
  $client->city=$request->input('ville');
  $client->country=$request->input('pays');
  session()->flash('success','Le client à été bien enregistré ! !');
$client->save();
return  redirect ('clients');
}
//recuperer un client -> mettre dans formulaire
public function edit($id){
 $client=Clients::find($id);
 return view ('clients.edit',['client'=>$client]);
}

public function details($id){
 $client=Clients::find($id);
 return view ('clients.details',['client'=>$client]);
}
//modifier un client
public function update(clientRequest $request,$id){
 $client=Clients::find($id);
 $client->civility=$request->input('civilite');
 $client->nom=$request->input('nom');
 
 
 $client->prenom=$request->input('prenom');
 $client->age=$request->input('age');
 $client->email=$request->input('email');

 $client->telephone=$request->input('tele');
 $client->adresse=$request->input('adr');
 $client->city=$request->input('ville');
 $client->country=$request->input('pays');
 session()->flash('success','Le client à été bien modifiée ! !');
$client->save();
return  redirect ('clients');
}
//supprimer un client
public function destroy(Request $request,$id){
 $client=Clients::find($id);
 $client->delete();
 session()->flash('success','Le client à été bien supprimée ! !');
 return redirect ('clients');
}
}
