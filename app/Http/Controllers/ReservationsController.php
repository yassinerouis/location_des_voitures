<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Cars;
use App\Cities;
use App\Reservations;
use App\Supplement_reservations;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\reservationRequest;

//les reservations effectuees par l'admin aux clients

class ReservationsController extends Controller
{
  
  public function __construct(){
    $this->middleware('auth');
  }
    //lister les reservations
   public function index(){
    //$listreservation=DB::table('reservations')->where('deleted_at',null);
    //$listreservation=Reservations::all();
    $x=User::find(Auth::user()->id);
   
if($x->is_admin){
  $listreservation=DB::table('reservations')
  ->join('users',"users.id",'=','reservations.user_id')
  ->join('cars',"cars.id",'=','reservations.car_id')
  ->select('reservations.id','reservations.updated_at','reservations.status','reservations.date_debut','reservations.date_fin', 'reservations.lieu_debut','reservations.lieu_fin','reservations.prix_total','users.name','cars.Nom')
  ->where('deleted_at','=',null)
  ->get();
  return view ('reservations.index',['reservations'=>$listreservation]);
}
else{
  $listreservation=DB::table('reservations')
    ->join('users',"users.id",'=','reservations.user_id')
    ->join('cars',"cars.id",'=','reservations.car_id')
    ->select('reservations.id','reservations.updated_at','reservations.has_paid','reservations.date_debut','reservations.methode_payement','reservations.prix_total','reservations.date_fin','cars.Nom','cars.image')
    ->where('deleted_at','=',null)
    ->where('user_id','=',$x->id)
    ->where('status','=','confirmé')    
    ->get();
   
       return view ('reservation_client.index',['reservations'=>$listreservation]);
}
}
public function corbeille(){
  
$listreservation=DB::table('reservations')
  
  ->join('cars',"cars.id",'=','reservations.car_id')
  ->join('users',"users.id",'=','reservations.user_id')
  ->select('reservations.id','reservations.updated_at','users.name','reservations.status','reservations.date_debut','reservations.date_fin', 'reservations.lieu_debut','reservations.lieu_fin','reservations.prix_total','cars.Nom')
           ->where('deleted_at','!=',null)   
          
  ->get();

  return view ('reservations.corbeille',['reservations'=>$listreservation]);
}
//afficher le formulaire de creation
public function create(){
  $x=User::find(Auth::user()->id);
  $cars=Cars::all();
 $users=User::all();
 $villes=Cities::all();
  if($x->is_admin){
 return view ('reservations.create',compact('cars','users','villes'));
  }else{
    return view ('reservation_client.create',compact('cars','villes'));
  }
}
public function create_client($id){
  $user=User::find(Auth::user()->id);
  $car=Cars::find($id);
  $villes=Cities::all();
  if(!$user->is_admin)
 return view ('reservation_client.create',compact('car','user','villes'));
}
//enregistrer un reservation
public function store(Request $request){
  $x=User::find(Auth::user()->id);
  $reservation=new Reservations();
  $sup=new Supplement_reservations();
  if($x->is_admin){
    $reservation->status=$request->input('status');
    $reservation->user_id=$request->input('client');
    $reservation->has_paid=$request->input('paye');
    }
 else{
  $reservation->status='en attente';
  $reservation->user_id=$x->id;
  $reservation->has_paid='non';
 }
  $reservation->type=$request->input('type');
  $reservation->car_id=$request->input('car');
  $reservation->date_debut=$request->input('dretrait');
  $reservation->date_fin=$request->input('dretour');
  $reservation->lieu_debut=$request->input('lretrait');
  $reservation->lieu_fin=$request->input('lretour');
  $reservation->numero_vol=$request->input('codev');
  $reservation->numero_aeroport=$request->input('aeroport');
  $reservation->prix_total=$request->input('prix');
  $reservation->id_device=1;
  $reservation->methode_payement=$request->input('methodep');
  
  $reservation->message=$request->input('msg');
  $reservation->ip_adresse=$request->ip();
$reservation->save();
$date=date_create($reservation->date_fin);
  $mois=$date->format('m');
  $sup->reservation_id=$reservation->id;
if($mois==6||$mois==7||$mois==8||$mois==5){
$sup->supplement_id=1;
}
else if($mois==1||$mois==4||$mois==12||$mois==9){
  $sup->supplement_id=2;
}
else{
  $sup->supplement_id=3;
}
$sup->save();

session()->flash('success','La réservation à été bien enregistré ! !');

return redirect('reservations');

}


//recuperer un reservation -> mettre dans formulaire
public function edit($id){
  $x=User::find(Auth::user()->id);
  $reservations=DB::table('reservations')
  ->join('users',"users.id",'=','reservations.user_id')
  ->join('cars',"cars.id",'=','reservations.car_id')
  ->select('reservations.id','reservations.updated_at','reservations.status','reservations.type','reservations.car_id','reservations.user_id','reservations.has_paid','reservations.methode_payement','reservations.numero_aeroport','reservations.numero_vol','reservations.message','reservations.date_debut','reservations.date_fin', 'reservations.lieu_debut','reservations.lieu_fin','reservations.prix_total','users.name','cars.Nom')
  ->where('reservations.id','=',$id)
  ->get();
 $user=User::All();
 $villes=Cities::all();
 $car=Cars::All();
 if($x->is_admin){
  return view ('reservations.edit',compact('reservations','user','car','villes'));
 }
 else{
  return view ('reservation_client.edit',compact('reservations','car','villes'));
 }

}

public function details($id){
 
  $reservation=Reservations::find($id);
  $car=Cars::find($reservation->car_id);
    $user=User::find($reservation->user_id);
    $x=User::find(Auth::user()->id);
 if($x->is_admin){
  return view ('reservations.details',compact('reservation','user','car'));
 }
 else
 return view ('reservation_client.details',compact('reservation','user','car'));
      
    
 
 
}
public function annuler($id){
  
  $affected = DB::update("update reservations set deleted_at = null where id = $id");
  //$reservation=DB::update("update reservations set deleted_at = null where id = $id");
  session()->flash('success','La suppression de la reservation a été bien annulée ! !');
  return redirect ('reservations');
 }
//modifier un reservation
public function update(Request $request,$id){
  $x=User::find(Auth::user()->id);
 $reservation=Reservations::find($id);
 $sup=new Supplement_reservations();
 if($x->is_admin){
  $reservation->status=$request->input('status');
  $reservation->user_id=$request->input('client');
  $reservation->has_paid=$request->input('paye');
  }
$reservation->type=$request->input('type');
$reservation->prix_total=$request->input('prix');
$reservation->car_id=$request->input('car');
$reservation->date_debut=$request->input('dretrait');
$reservation->date_fin=$request->input('dretour');


$reservation->lieu_debut=$request->input('lretrait');
$reservation->lieu_fin=$request->input('lretour');
$reservation->numero_vol=$request->input('codev');
$reservation->numero_aeroport=$request->input('aeroport');
$reservation->id_device=1;
$reservation->methode_payement=$request->input('methodep');

$reservation->message=$request->input('msg');
$reservation->ip_adresse="1.1.1.1";
$reservation->save();
$date=date_create($reservation->date_fin);
$mois=$date->format('m');
$sup->reservation_id=$reservation->id;
if($mois==6||$mois==7||$mois==8||$mois==5){
$sup->supplement_id=1;
}
else if($mois==1||$mois==4||$mois==12||$mois==9){
  $sup->supplement_id=2;
}
else{
  $sup->supplement_id=3;
}
$sup->save();

session()->flash('success','La réservation à été bien modifiée ! !');
return  redirect ('reservations');
}

//supprimer un reservation
public function destroy(Request $request,$id){

 $reservation=Reservations::find($id);

$supl=Supplement_reservations::where('reservation_id', $id)
->delete();

 $reservation->delete();
 session()->flash('success','La réservation à été bien supprimée ! !');
 return redirect ('reservations');
}
}
