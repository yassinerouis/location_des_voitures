<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\reservationRequest;
use Auth;
use App\User;
use App\Cars;
use App\Reservations;
use App\Supplement_reservations;
use Illuminate\Support\Facades\DB;
class ReservationClientController extends Controller
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
        
        ->get();
        return view ('reservations.index',['reservations'=>$listreservation]);
        }
        else{
        $listreservation=DB::table('reservations')
          ->join('users',"users.id",'=','reservations.user_id')
          ->join('cars',"cars.id",'=','reservations.car_id')
          ->select('reservations.id','reservations.updated_at','reservations.date_debut','reservations.date_fin','cars.Nom','cars.image')
          ->where('deleted_at','=',null)
          ->where('user_id','=',$x->id)    
          ->get();
         
             return view ('reservation_client.index_client',['reservations'=>$listreservation]);
        }
      }
    //afficher le formulaire de creation
    public function create(){
     $cars=Cars::all();
     $id=Auth::user()->id;
     $user=User::find($id);
     return view ('reservation_client.create_client',compact('cars','user'));
    }
    
    //enregistrer un reservation
    public function store(Request $request){
     $reservation=new Reservations();
     $sup=new Supplement_reservations();
     $reservation->status='en attente';
      $reservation->type=$request->input('type');
      $reservation->user_id=Auth::user()->id;
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
      $reservation->has_paid='non';
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
    
    session()->flash('success','La réservation à été bien enregistré ! !');
    
    return  redirect ('reservation_client');
    }
    //recuperer un reservation -> mettre dans formulaire
    public function edit($id){
     $reservation=Reservations::find($id);
     
     $user=User::All();
     $car=Cars::All();
     
     return view ('client.edit',compact('reservation','user','car'));
     
    }
    
    public function details($id){
     $reservation=Reservations::find($id);
     $user=User::find($reservation->user_id);
     $car=Cars::find($reservation->user_id);
     
     return view ('client.details',compact('reservation','user','car'));
     
    }
    
    //modifier un reservation
    public function update(reservationRequest $request,$id){
     $reservation=Reservations::find($id);
     $sup=new Supplement_reservations();
     $reservation->status=$request->input('status');
     $reservation->type=$request->input('type');
     $reservation->user_id=Auth::user()->id;
     
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
     $reservation->has_paid=$request->input('paye');
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
    return  redirect ('reservation_client');
    }
    
    //supprimer un reservation
    public function destroy(Request $request,$id){
    
     $reservation=Reservations::find($id);
    
    $supl=Supplement_reservations::where('reservation_id', $id)
    ->delete();
    
     $reservation->delete();
     session()->flash('success','La réservation à été bien supprimée ! !');
     return redirect ('reservation_client');
    }
        
}
