<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog_categories;
class Blog_categoriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
    //lister les blogs
   public function index(){

    $listcat=Blog_categories::all();
    return view ('blog_categories.index',['categories'=>$listcat]);

}
//afficher le formulaire de creation
public function create(){
return view('blog_categories.create');
}

 //enregistrer un car
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
//recuperer un car -> mettre dans formulaire
public function edit($id){
    $categorie=Blog_categories::find($id);
    return view ('blog_categories.edit',['categorie'=>$categorie]);
}
public function details($id){
    $categorie=Blog_categories::find($id);
    return view ('blog_categories.details',['categorie'=>$categorie]);
}
//modifier un car
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
//supprimer un car
public function destroy(Request $request,$id){
    $categorie=Blog_categories::find($id);
    $categorie->delete();
    session()->flash('success','La categorie à été bien supprimée ! !');
    return redirect ('blog_categories');
}
}
