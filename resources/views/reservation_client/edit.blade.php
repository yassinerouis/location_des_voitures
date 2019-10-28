@extends('layouts.app_client')
@section('content')


<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
    @foreach($reservations as $reservation)
			<form action="{{url('reservations/'.$reservation->id) }}" method="post">
      <input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
  
        
  <div class="form-group">

  <label for="sel1">Type :</label>
  <select class="form-control" name="type">
    <option>{{$reservation->type}}</option>
   
  </select>
</div>
<div class="form-group">
    <label for="titre">Date de retrait :</label>
    <input type="date" value="{{$reservation->date_debut}}" name="dretrait" class="form-control  @if($errors->get('dretrait')) is-invalid @endif">
    @if($errors->get('prix'))
    @foreach($errors->get('dretrait') as $message)
    <div class="alert alert-danger" role="alert">Ce champ est obligatoire</div>
@endforeach
@endif
    

  </div>
  <div class="form-group">
    <label for="titre">Date de retour :</label>
    <input type="date" value="{{$reservation->date_fin}}" name="dretour" class="form-control  @if($errors->get('dretour')) is-invalid @endif">
    @if($errors->get('dretour'))
    @foreach($errors->get('dretour') as $message)
    <div class="alert alert-danger" role="alert">Ce champ est obligatoire</div>
@endforeach
@endif

  </div>
  <div class="form-group">
  <label>Lieu retrait :</label>
  <select id="y" name="lretrait" class="form-control">
<option>{{$reservation->lieu_debut}}</option>
  @foreach($villes as $v)
  @if($v->name!=$reservation->lieu_debut)
    <option>{{$v->name}}</option>
    @endif
    @endforeach
    
  </select>
    
  </div>
  <div class="form-group">
  <label>Lieu retour :</label>
  <select name="lretour" class="form-control">
<option>{{$reservation->lieu_fin}}</option>
  @foreach($villes as $v)
  @if($v->name!=$reservation->lieu_fin)
    <option>{{$v->name}}</option>
    @endif
    @endforeach
  </select>
  </div>
<div class="form-group">
  <label for="categorie">Voiture :</label>
  <select class="form-control" id="car" name="car">
  @foreach($car as $c)
  <option value="{{$c->id}}">{{$c->Nom}}</option>
  @endforeach
  </select>
</div>
 
<div class="form-group" id="x">
</div>
<input type="checkbox" id="che">Validé les supplements
<div class="form-group">
    <label for="number">Prix Total :</label>
    <input type="number" id="prix" class="form-control" value="{{$reservation->prix_total}}" name="prix" >
    
  </div>

<div class="form-group">
  <label for="sel1">Méthode de payement :</label>
  <select class="form-control" name="methodep">
    <option>{{$reservation->methode_payement}}</option>
    @if($reservation->methode_payement=="En arrive")
    
    <option>Paypal</option>
    <option>Master Card</option>
    <option>Virement Bancaire</option>
    @elseif($reservation->methode_payement=="Paypal")
   
    
    <option>En arrive</option>
    <option>Master Card</option>
    <option>Virement Bancaire</option>
    
    @elseif($reservation->methode_payement=="Master Card")
    
    <option>Paypal</option>
    <option>En arrive</option>
    <option>Virement Bancaire</option>
   
    @elseif($reservation->methode_payement=="Virement Bancaire")
    <option>Paypal</option>
    <option>En arrive</option>
    <option>Master Card</option>
    @endif
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
  @endforeach
  <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>
<script type="text/javascript">
var somme=0;
var prx=0;
$("#che").click(function(){
 // var checkedValue = parseInt($('.ajx:checked').val())+1;
 
var inputElements = document.getElementsByClassName('ajx');

for(var i=0; i<inputElements.length; i++){
      if(inputElements[i].checked){
           somme+=parseInt(inputElements[i].value);
      }
}
somme+=parseInt(prx);
$("#prix").val(somme);
somme=0;
   });
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#car").change(function(e){
        e.preventDefault();
         var car = $("#car").val();
         var dd = $("#dd").val();
         var dr= $("#dr").val();
        $.ajax({
           type:'GET',
           url:'/ajaxRequest',
           data:{name:car,dd:dd,dr:dr},
           success:function(data){
              // alert(data.prix);
              prx=data.prix;
              $("#prix").val(prx);
             //prix=data.supplement;
              $("#x").html(data.sup);
           }
        });
    });
    
   

</script>
@endsection