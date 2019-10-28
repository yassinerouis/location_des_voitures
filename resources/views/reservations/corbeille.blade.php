@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>La Liste des Reservations supprimées</h1>
			
			<table class="table">
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
  <body>
  	@foreach($reservations as $c)
    <tr>
      <td>{{$c->status}}</td>
      
      <td>{{$c->updated_at}}</td>
     
      <td>{{$c->Nom}}</td>
      <td>{{$c->name}}</td>
      <td>{{$c->date_debut}}</td>
      <td>{{$c->date_fin}}</td>
      <td>{{$c->lieu_debut}}</td>
      <td>{{$c->lieu_fin}}</td>
      <td>{{$c->prix_total}}</td>
      <td>
      
      	<a href="{{url('reservations/'.$c->id.'/annuler')}}" class="btn btn-primary">Annuler la suppression</a>
      
      	
      
   
      </td>
    </tr>
    @endforeach
  </body>
  
</table>

<a href="{{url('reservations')}}" class="btn btn-primary">Retour</a>
		</div>
	</div>
</div>

@endsection