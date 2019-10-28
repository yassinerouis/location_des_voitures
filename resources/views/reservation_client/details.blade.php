@extends('layouts.app_client')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('reservations') }}" >
     
				{{ csrf_field() }}
               
        <div class="form-group">
  <label for="sel1">Status :</label>
  <select class="form-control" name="status">
    <option>{{$reservation->status}}</option>
   
  </select>
</div>
  <div class="form-group">
  <label for="sel1">Type :</label>
  <select class="form-control" name="type">
    <option>{{$reservation->type}}</option>
   
  </select>
</div>
<div class="form-group">
    <label for="titre">Date de retrait :</label>
    <input type="date" value="{{$reservation->date_debut}}" name="dretrait" class="form-control">
    

  </div>
  <div class="form-group">
    <label for="titre">Date de retour :</label>
    <input type="date" value="{{$reservation->date_fin}}" name="dretour" class="form-control">
    

  </div>
  <div class="form-group">
    <label for="titre">Lieu retrait :</label>
    <input type="text" name="lretrait" value="{{$reservation->lieu_debut}}" class="form-control" placeholder="Lieu de début ">
  </div>
  <div class="form-group">
    <label for="titre">Lieu Retour :</label>
    <input type="text" name="lretour" class="form-control" value="{{$reservation->lieu_fin}}" placeholder="Lieu de fin ">
  </div>
  <div class="form-group">
  <label for="categorie">Voiture :</label>
  <select class="form-control" name="car">
  
  <option value="{{$car->id}}">{{$car->Nom}}</option>
    
  </select>
</div>

<div class="form-group">
  <label for="categorie">Client :</label>
  
  <select class="form-control" name="client">
  
  <option value="{{$user->id}}">{{$user->name}}</option>
   
  </select>
</div>

    <div class="form-group">
    <label for="number">Prix Total :</label>
    <input type="number" class="form-control" value="{{$reservation->prix_total}}" name="prix" >
  </div>
  <div class="form-group">
  <label for="sel1">Payé :</label>
  <select class="form-control" name="paye">
    <option>{{$reservation->has_paid}}</option>
    
  </select>
</div>
<div class="form-group">
  <label for="sel1">Méthode de payement :</label>
  <select class="form-control" name="methodep">
    <option>{{$reservation->methode_payement}}</option>
    
  </select>
</div>
<div class="form-group">
    <label for="titre">Code de vol :</label>
    <input type="text" name="codev" value="{{$reservation->numero_vol}}" class="form-control" placeholder="code de vol">
  </div>
  <div class="form-group">
    <label for="titre">Aéroport :</label>
    <input type="text" name="aeroport" class="form-control" value="{{$reservation->numero_aeroport}}" placeholder="code de l'aeroport">
  </div>
  
  
  <div class="form-group">
    <label for="desciption">Message/Commentaire :</label>
    <textarea name="msg"  class="form-control" placeholder="Commentaire">{{$reservation->message}}</textarea> 
  </div>
  <input type="submit" href="url('reservations')" class="btn btn-primary" value="Retour">
</form>
@endsection