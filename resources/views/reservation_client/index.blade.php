@extends('layouts.principal')
@section('contenu')
<div class="container">
	<div class="row">
  <br>
    <br>
    <br>
    <br>
		<div class="col-md-12">
    @if(session()->has('success'))
    <div class="alert alert-success col-md-8 col-md-offset-2">
    {{session()->get('success')}}
    </div>
    @endif
      <div class="row"><h1>La Liste des Reservations</h1>
      @foreach($reservations as $c)
  <div class="col-xs-6 col-md-5">
    <div class="thumbnail" width="300" higth="300">
      <img  src="storage/{{$c->image}}">
      <div class="caption">
      @if($c->methode_payement=="Paypal" && $c->has_paid=="non")
     <center><form action="{{url('payment')}}" method="post">
        <input type="hidden" name="prix" value="{{$c->prix_total}}">
        <input type="hidden" name="idr" value="{{$c->id}}">
        <input type="hidden" name="car" value="{{$c->Nom}}">
      
        {{csrf_field()}}
        
      	<button type="submit" href class="btn btn-warning" >Payer</button> 
      </form></center>
      @endif
      <h3>Voiture {{$c->Nom}}</h3>
      <p>De :{{$c->date_debut}} à {{$c->date_fin}}</p>
      <p>
      
      <form action="{{url('reservations/'.$c->id)}}">
      	
      <a href="{{url('facture/'.$c->id)}}" class="btn btn-warning">Facture</a>
        <a href="{{url('reservations/'.$c->id.'/details')}}" class="btn btn-primary">Détails</a>
      	<a href="{{url('reservations/'.$c->id.'/edit')}}" class="btn btn-success">Editer</a>
        {{csrf_field()}}
        {{method_field('DELETE')}}
      	<button type="submit" href class="btn btn-danger" onclick="return confirm('Vous étes sure que vous voullez supprimer cette réservarion?')">Supprimer</button> 
      </form>
       
      </p>
    </div>

  </div>

</div>
@endforeach
</div>

		</div>
	</div>
</div>
@endsection