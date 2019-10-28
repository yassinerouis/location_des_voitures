@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
    @if(session()->has('success'))
    <div class="alert alert-success col-md-8 col-md-offset-2">
    {{session()->get('success')}}
    </div>
    @endif
			<h1>La Liste des Reservations </h1>

			<div class="pull-right">
				<a class="btn btn-warning" href="{{url('reservations/create')}}">Nouvelle Reservation</a>
        <a  class="btn btn-secondary" href="{{url('reservations/corbeille')}}">Corbeille</a>
			</div>
      {{csrf_field()}}
        {{method_field('DELETE')}}
      <h2>Recherche par status: </h2>
<select id="rech" class="form-control" name="status">
    <option>En attente</option>
    <option>Confirmé</option>
    <option>En cours</option>
    <option>Terminée</option>
    <option>Annulée</option>
    <option>Périmée</option>
    
  </select>
			<table id="re" class="table">
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
      <td>{{$c->name}} </td>
      <td>{{$c->date_debut}}</td>
      <td>{{$c->date_fin}}</td>
      <td>{{$c->lieu_debut}}</td>
      <td>{{$c->lieu_fin}}</td>
      <td>{{$c->prix_total}}</td>
      <td>
      <form action="{{url('reservations/'.$c->id)}}">
      	
      	
        <a href="{{url('reservations/'.$c->id.'/details')}}" class="btn btn-primary">Détails</a>
      	<a href="{{url('reservations/'.$c->id.'/edit')}}" class="btn btn-success">Editer</a>
        <a href="{{url('facture/'.$c->id)}}" class="btn btn-warning">Facture</a>
        {{csrf_field()}}
        {{method_field('DELETE')}}
      	<button type="submit" href class="btn btn-danger" onclick="return confirm('Vous étes sure que vous voullez supprimer cette réservarion?')">Supprimer</button> 
      </form>
     
 
      </td>
    </tr>
    @endforeach
  </body>
  
</table>
		</div>
	</div>
</div>
<script type="text/javascript">

   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   

    $("#rech").change(function(e){
        e.preventDefault();
         
         var rech= $("#rech").val();
        $.ajax({
           type:'GET',
           url:'/ajaxRecherche',
           data:{name:rech},
           success:function(data){
             
              
            
              $("#re").html(data.recherche);
           }
        });
    });
    
   

</script>
@endsection