<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog_categories;
//autoriser pour l'admin (en general) , mais il y a des routes pour l'utilisateur
//ce controlleur fais la gestion des categories des publications publiees par les administrateurs
//blog_categorie:categorie d'une publication
class Blog_categoriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
    //lister les categories
   public function index(){

    $listcat=Blog_categories::all();
    return view ('blog_categories.index',['categories'=>$listcat]);

}
//afficher le formulaire de creation
public function create(){
return view('blog_categories.create');
}

 //enregistrer la categorie
public function store(Request $request){
   $categorie=new Blog_categories();
    $categorie->name=$request->input('nom');
    $categorie->meta_title=$request->input('titre');
    $categorie->slug=$request->input('slug');
    $categorie->meta_description=$request->input('desc');
    
    session()->flash('success','La categorie à été bien enregistrée ! !');
$categorie->save();
return  redirect ('blog_categories');
}
//recuperer une categorie -> mettre dans le formulaire
public function edit($id){
    $categorie=Blog_categories::find($id);
    return view ('blog_categories.edit',['categorie'=>$categorie]);
}
//recuperer une categorie -> envoyer pour l'affichage
public function details($id){
    $categorie=Blog_categories::find($id);
    return view ('blog_categories.details',['categorie'=>$categorie]);
}
//modifier une categorie
public function update(Request $request,$id){
    $categorie=Blog_categories::find($id);
    $categorie->name=$request->input('nom');
    $categorie->meta_title=$request->input('titre');
    $categorie->slug=$request->input('slug');
    $categorie->meta_description=$request->input('desc');
    
    session()->flash('success','La categorie à été bien modifiée ! !');
$categorie->save();
return  redirect ('blog_categories');
}
//supprimer une categorie
public function destroy(Request $request,$id){
    $categorie=Blog_categories::find($id);
    $categorie->delete();
    session()->flash('success','La categorie à été bien supprimée ! !');
    return redirect ('blog_categories');
}
}
