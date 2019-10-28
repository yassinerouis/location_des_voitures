<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;
use App\Cars_supplements;
use App\Supplements;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class Cars_supplementsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
     //lister les cars
     public function index(){
        $listcar=DB::table('cars_supplements')
        ->join('supplements',"supplements.id",'=','cars_supplements.supplement_id')
        ->select('cars_supplements.id','supplements.name','supplements.title','supplements.descrition','supplements.image')   
        ->get();
       
        return view ('supplements_car.index',['cars'=>$listcar]);
  }
  //afficher le formulaire de creation
  public function create(){
     $listcat=Cars::all();
     return view ('supplements_car.create',['cars'=>$listcat]);
  }
   //enregistrer un car
  public function store(Request $request){
     $scar=new Cars_supplements();
$supplement=new Supplements();
      $supplement->name=$request->input('nom');
      $supplement->title=$request->input('titre');
      $scar->car_id=$request->input('car');
      $supplement->image_alt=$request->input('alt');
      $supplement->slug=$request->input('slug');
      $supplement->image=$request->file('image')->store('images');
  
      $scar->price=$request->input('prix');
      
      $supplement->descrition=$request->input('desc');
      $supplement->save();
      $scar->supplement_id=$supplement->id;
      session()->flash('success','Le supplement de la voiture à été bien enregistré ! !');
  $scar->save();
  return  redirect ('supplement_cars');
  }
 
  //supprimer un car
  public function destroy(Request $request,$id){
     $car=Cars_supplements::find($id);
    
     $car->delete();
     session()->flash('success','Le supplement de la voiture à été bien Supprimée ! !');
     return redirect ('supplement_cars');
  }
}
