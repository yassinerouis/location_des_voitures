<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cars;
use App\User;
use App\Cars_categories;
use App\Cars_prices;
use Auth;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\carRequest;
class CarsController extends Controller
{
   public function __construct(){
      $this->middleware('auth');
    }
   //lister les cars
   public function index(){
      $x=User::find(Auth::user()->id);
      $listcar=Cars::all();
      if($x->is_admin){
         return view ('cars.index',['cars'=>$listcar]);
      }
      else{
         $cars=DB::table('cars')
         ->where('cars.active','=',1)
         ->where('cars.disponible','=',1)
         ->get();
         $categ=Cars_categories::all();
         return view ('cars_client.index',compact('cars','categ'));
      }
}
//afficher le formulaire de creation
public function create(){
  
   $listcat=Cars_categories::all();

   return view ('cars.create',['categories'=>$listcat]);
   
}
 //enregistrer un car
public function store(Request $request){
   $car=new Cars();
  $prixcar1=new Cars_prices();
  $prixcar2=new Cars_prices();
  $prixcar3=new Cars_prices();
  
    $car->nom=$request->input('nom');
    $car->type=$request->input('type');
    
    $car->car_categorie_id=$request->input('categorie');
    $car->image_alt=$request->input('alt');
         $car->image=$request->file('image')->store('images');
      
    $car->nombre_places=$request->input('nbplaces');
    $car->doors=$request->input('nbportes');
    $car->bags=$request->input('nbbags');
    $car->air=$request->input('nbvalises');
    $car->active=$request->input('active');
    $car->disponible=$request->input('disponible');
    $car->climatise=$request->input('climat');
    session()->flash('success','La voiture à été bien enregistré ! !');
$car->save();
$prixcar1->car_id=$car->id;
$prixcar1->runting_day_id='1-7';
$prixcar1->price=$request->input('price');
$prixcar2->car_id=$car->id;
$prixcar2->runting_day_id='8-14';
$prixcar2->price=$request->input('price')*2;
$prixcar3->car_id=$car->id;
$prixcar3->runting_day_id='>14';
$prixcar3->price=$request->input('price')*3;
$prixcar1->save();
$prixcar2->save();
$prixcar3->save();
return  redirect ('cars');
}
//recuperer un car -> mettre dans formulaire
public function edit($id){
   $car=Cars::find($id);
   return view ('cars.edit',['car'=>$car]);
}
public function details($id){
   $car=Cars::find($id);
   return view ('cars.details',['car'=>$car]);
}
//modifier un car
public function update(Request $request,$id){
   $car=Cars::find($id);
   $car->nom=$request->input('nom');
   $car->type=$request->input('type');
    $car->image_alt=$request->input('alt');
    $car->image=$request->file('image')->store('images');
    $car->nombre_places=$request->input('nbplaces');
    $car->doors=$request->input('nbportes');
    $car->bags=$request->input('nbbags');
    $car->air=$request->input('nbvalises');
    $car->active=$request->input('active');
    $car->disponible=$request->input('disponible');
    $car->climatise=$request->input('climat');
    session()->flash('success','La voiture à été bien modifiée ! !');
$car->save();
return  redirect ('cars');
}
//supprimer un car
public function destroy(Request $request,$id){
   $car=Cars::find($id);
   $car->delete();
   session()->flash('success','La voiture à été bien Supprimée ! !');
   return redirect ('cars');
}
}
