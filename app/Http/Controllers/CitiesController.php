<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\citieRequest;

//ajout des ville , chaque ville il a des tarifs dans le payement

class CitiesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    //lister les cities
   public function index(){
    $listcitie=cities::all();
    return view ('cities.index',['cities'=>$listcitie]);
}
//afficher le formulaire de creation
public function create(){
 
 return view ('cities.create');
}
//enregistrer un citie
public function store(Request $request){
 $citie=new Cities();

  $citie->name=$request->input('nom');
  $citie->slug=$request->input('page');
  
  
  $citie->image=$request->file('image')->store('images');
  $citie->image_alt=$request->input('alt');
  $citie->price=$request->input('prix');
  session()->flash('success','La ville à été bien enregistrée ! !');
 
$citie->save();
return  redirect ('cities');
}
//recuperer un citie -> mettre dans formulaire
public function edit($id){
 $citie=Cities::find($id);
 return view ('cities.edit',['citie'=>$citie]);
}

public function details($id){
 $citie=Cities::find($id);
 return view ('cities.details',['citie'=>$citie]);
}
//modifier un citie
public function update(Request $request,$id){
 $citie=Cities::find($id);
 $citie->name=$request->input('nom');
  $citie->slug=$request->input('page');
  
  
  $citie->image=$request->file('image')->store('images');
  $citie->image_alt=$request->input('alt');
  $citie->price=$request->input('prix');

  session()->flash('success','La voiture à été bien modifiée ! !');
$citie->save();
return  redirect ('cities');
}
//supprimer un citie
public function destroy(Request $request,$id){
 $citie=Cities::find($id);
 $citie->delete();
 session()->flash('success','La voiture à été bien supprimée ! !');
 return redirect ('cities');
}
}
