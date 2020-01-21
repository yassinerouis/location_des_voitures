<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use PDF;
use Mail;
use Auth;
use App\User;
use Session;
//
class PrincipaleController extends Controller
{
    //affiche la page principale
    public function index()
    {
        return view('page_principale.index');
    }
    //dans cette fonction il y a des verification

    /* si l'utilisateur connecte est un admin c'est à dire admin reserve au client une voiture.
    un e-mail est envoye automatiquement au client à sa boite email qui contient les opperations
     effectuer par l'admin + facutre */

      /* sinon le client consulte sa facture qui est par defaut non paye */
    public function facture($id)
    {
        $x=User::find(Auth::user()->id);
        $reservation=DB::table('reservations')
        ->join('users',"users.id",'=','reservations.user_id')
        ->join('cars',"cars.id",'=','reservations.car_id')
        ->where('reservations.id','=',$id)
        ->select('reservations.id','reservations.has_paid','reservations.methode_payement','reservations.updated_at','reservations.user_id','reservations.status','reservations.date_debut','reservations.date_fin', 'reservations.lieu_debut','reservations.lieu_fin','reservations.prix_total','users.name','cars.Nom')
        ->get();
        $pdf=PDF::loadView('facture',['reservation'=>$reservation]);
        
        if($x->is_admin){
            $data;
            $y;
            foreach($reservation as $res){
                $data=array('name'=>$res->name,'car'=>$res->Nom,'id'=>$res->id);
                $y=User::find($res->user_id);
                
            }
           session()->put('email',$y->email);
            Mail::send("mail",$data,function($message){
                $message->to(session()->get('email'),'To yassine')
                ->subject(" Facture ");
                $message->from('contact@gmail.com','Rajicars');
            });
        }
    return $pdf->download("facture$id.pdf");
    }
    
}
