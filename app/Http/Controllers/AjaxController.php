<?php

namespace App\Http\Controllers;
use App\Cars_supplements;
use App\Cars;
use App\Cars_Categories;
use App\Supplements;
use App\Cars_prices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

/*AJAX est l'art d'échanger des données avec un serveur et de mettre à jour des parties d'une page Web,
 sans recharger toute la page. et ce controlleur nous donne cette possibilité.
*/
class AjaxController extends Controller
{
  public function ajaxCars(Request $request){
    $id_cat = $request->name;
    $cars=DB::table('cars')
    ->where('cars.active','=',1)
    ->where('cars.disponible','=',1)
    ->where('cars.car_categorie_id',"=",$id_cat)
    ->get();
$html="";

foreach($cars as $c){
   $html.='<div class="col-xs-6 col-md-6">
   <div class="thumbnail">
      <img width="30%" higth="30%" src="images/Voitures/'.$c->image.'">
      <div class="caption">
      <h3>Voiture '.$c->Nom.'</h3>
      <h4>Type : '.$c->type.'</h4>
      <center><a href="reserver/'.$c->id.'" class="btn btn-warning">Réserver</a><center>
    </div>
  </div>
</div>';
}
    return response()->json(['html'=>$html]);
  }
  
    public function ajaxRequest(Request $request)
    {
        
        $prixcar=new Cars_prices();
        $prix=0;
        $id_car = $request->name;
        $date1=date_create($request->dd);
        $date2=date_create($request->dr);
        $diff = $date2->diff($date1)->format("%a");
        $diff=(int)$diff;
    if($diff>=0 && $diff<=7){
        $prixcar=DB::table('cars_prices')
    ->where('car_id','=',$id_car)
    ->where('runting_day_id','=','1-7')
    ->get();
$prix=$prixcar[0]->price;
    }
    else if($diff>=8 && $diff<=14){
        $prixcar=DB::table('cars_prices')
    ->where('car_id','=',$id_car)
    ->where('runting_day_id','=','8-14')
    ->get();
    $prix=$prixcar[0]->price;
    }else
    {
        $prixcar=DB::table('cars_prices')
    ->where('car_id','=',$id_car)
    ->where('runting_day_id','=','>14')
    ->get();
    $prix=$prixcar[0]->price;
    }
    
    $sup=DB::table('cars_supplements')
    ->join('supplements','supplements.id','=','cars_supplements.id')
    ->select('supplements.id','cars_supplements.price','supplements.name')
    ->where('cars_supplements.car_id','=',$id_car)
    ->get();
    /*$s=$sup[0]->{'name'};
    $x=$sup[0]->{'price'};
   echo "$s";
   echo "$x";*/
   $html='<label >Supplements:</label><br>';
   foreach($sup as $a){
    $s=$a->{'name'};
    $x=$a->{'price'};
    $html.=' <input type="checkbox" class="ajx" id='."$s".' value='."$x".'>'.$s.'<br>';
   }
  
    return response()->json(['prix'=>$prix,'sup'=>$html]);
    }
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRecherche(Request $request)
    {
        $statut = $request->name;
        $listrecherche=DB::table('reservations')
  ->join('users',"users.id",'=','reservations.user_id')
  ->join('cars',"cars.id",'=','reservations.car_id')
  ->select('reservations.id','reservations.updated_at','reservations.status','reservations.date_debut','reservations.date_fin', 'reservations.lieu_debut','reservations.lieu_fin','reservations.prix_total','users.name','cars.Nom')
 ->where('reservations.status','=',$statut)
 ->where('deleted_at','=',null)
  ->get();
$html='<table>
<thead>
  <tr>
    <th>Status</th>
    <th>Date de réservation</th>
    <th>Voiture</th>
    
    <th>Client</th>
    <th>Date retrait</th>
    <th>Date retour</th>
    <th>Ville retrait</th>
    <th>Ville retour</th>
    <th>Prix</th>
    <th>Action</th>
  </tr>
</thead>
<body>';
  foreach($listrecherche as $c){
      $s=$c->status;
      $u=$c->updated_at;
      $n=$c->Nom;
      $name=$c->name;
      $dd=$c->date_debut;
      $df=$c->date_fin;
      $ld=$c->lieu_debut;
      $lf=$c->lieu_fin;
      $pr=$c->prix_total;
   
    $html.="<tr><td>$s</td><td>$u</td><td>$n</td><td>$name</td><td>$dd</td><td>$df</td><td>$ld</td><td>$ld</td><td>$pr</td>";
    $html.=' <td>
    <form action="reservations/'.$c->id.'">
      
      
      <a href="reservations/'.$c->id.'/details" class="btn btn-primary">Détails</a>
      <a href="reservations/'.$c->id.'/edit" class="btn btn-success">Editer</a>
      <a href="facture/'.$c->id.'" class="btn btn-warning">Facture</a>
      <button type="submit" href class="btn btn-danger" >Supprimer</button> 
      
    </form>
   

    </td></tr>';
   } return response()->json(['recherche'=>$html]);


    }

}
