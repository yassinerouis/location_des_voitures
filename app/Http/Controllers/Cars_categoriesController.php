<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Cars_categories;
use App\Http\Requests\car_categorieRequest;
class Cars_categoriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
    //lister les cars
   public function index(){
    $listcat=Cars_categories::all();
    return view ('cars_categories.index',['categories'=>$listcat]);
}
//afficher le formulaire de creation
public function create(){
return view('cars_categories.create');
}

 //enregistrer un car
public function store(Request $request){
   $categorie=new Cars_categories();
    $categorie->nom=$request->input('nom');
    $categorie->titre=$request->input('titre');
    $categorie->nombre_de_voitures=$request->input('nombre');
    $categorie->description=$request->input('desc');
    $categorie->image=$request->file('image')->store('images');
    $categorie->description_ref=$request->input('desc_ref');
    $categorie->titre_ref=$request->input('titre_ref');
    session()->flash('success','La categorie à été bien enregistrée ! !');
$categorie->save();
return  redirect ('categories');
}
//recuperer un car -> mettre dans formulaire
public function edit($id){
    $categorie=Cars_categories::find($id);
    return view ('cars_categories.edit',['categorie'=>$categorie]);
}
public function details($id){
    $categorie=Cars_categories::find($id);
    return view ('cars_categories.details',['categorie'=>$categorie]);
}
//modifier un car
public function update(Request $request,$id){
    $categorie=Cars_categories::find($id);
    $categorie->nom=$request->input('nom');
    $categorie->titre=$request->input('titre');
    $categorie->nombre_de_voitures=$request->input('nombre');
    $categorie->description=$request->input('desc');
    $categorie->image=$request->file('image')->store('images');
    $categorie->description_ref=$request->input('desc_ref');
    $categorie->titre_ref=$request->input('titre_ref');
    session()->flash('success','La categorie à été bien modifiée ! !');
$categorie->save();
return  redirect ('categories');
}
//supprimer un car
public function destroy(Request $request,$id){
    $categorie=Cars_categories::find($id);
    $categorie->delete();
    session()->flash('success','La categorie à été bien supprimée ! !');
    return redirect ('categories');
}
}
