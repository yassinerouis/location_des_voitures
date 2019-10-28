@extends('layouts.app_client')
@section('content')


<!--main-container-part-->
<div class="container">
	<div class="row">
		
			<form action="{{url('reservations')}}" method="post">
				{{ csrf_field() }}
        <div class="col-md-12">
    <div class="form-group">
        
    <div class="thumbnail">
      <img width="50%" hight="50%" src="../storage/{{$car->image}}">
      <div class="caption">
  <label for="categorie">Voiture :</label>
  <select class="form-control" id="car" name="car">
  <option value="{{$car->id}}">{{$car->Nom}}</option>
  
  </select>
 
  <h3> <p>Autres Carractéristiques:<p><p>Doors:{{$car->doors}} - Places:{{$car->nombre_places}} - bags: {{$car->bags}} - air: {{$car->air}}</p><p>@if($car->climaisé==1) La voiture est CLIMATISER @endif</p><h3>
  
  </div>
    
</div>
</div>
  <div class="form-group">
  <label for="sel1">Type :</label>
  <select class="form-control" name="type">
  
    <option>En ligne</option>
   
  </select>
</div>

<div class="form-group">
    <label for="titre">Date de retrait :</label>
    <input type="date" id="dd" name="dretrait" value="{{old('dretrait')}}" class="form-control  @if($errors->get('dretrait')) is-invalid @endif">
    @if($errors->get('dretrait'))
    @foreach($errors->get('dretrait') as $message)
    <div class="alert alert-danger" role="alert">Ce champ est obligatoire</div>
@endforeach
@endif
  </div>
  <div class="form-group">
    <label for="titre">Date de retour :</label>
    <input id="dr" type="date" name="dretour" value="{{old('dretour')}}" class="form-control  @if($errors->get('dretour')) is-invalid @endif">
    @if($errors->get('dretour'))
    @foreach($errors->get('dretour') as $message)
    <div class="alert alert-danger" role="alert">Ce champ est obligatoire</div>
@endforeach
@endif

  </div>
  <div class="form-group">
  <label>Lieu retrait :</label>
  <select id="y" name="lretrait" class="form-control">
  @foreach($villes as $v)
    <option value="{{$v->id}}">{{$v->name}}</option>
    @endforeach
    
  </select>
</div>     
  
  <div class="form-group">
    <label for="titre">Lieu Retour :</label>
    <select id="ldeb" name="lretour" class="form-control">
  @foreach($villes as $v)
    <option value="{{$v->id}}">{{$v->name}}</option>
    
    @endforeach
    
  </select>
  </div>



  <div class="form-group" id="x">
</div>
<input type="checkbox" id="che">Validé les supplements





    <div class="form-group">
    <label for="number">Prix Total :</label>
    <input type="number" id="prix" class="form-control  @if($errors->get('prix')) is-invalid @endif" value="{{old('prix')}}" name="prix">
    @if($errors->get('prix'))
    @foreach($errors->get('prix') as $message)
    <div class="alert alert-danger" role="alert">Ce champ est obligatoire</div>
@endforeach
@endif
  </div>
<div class="form-group">
  <label for="sel1">Méthode de payement :</label>
  <select class="form-control" name="methodep">
    <option>En arrive</option>
    <option>Paypal</option>
    <option>Master Card</option>
    <option>Virement Bancaire</option>
  </select>
</div>
<div class="form-group">
    <label for="titre">Code de vol :</label>
    <input type="text" name="codev" class="form-control" value="{{old('codev')}}" placeholder="code de vol">

  </div>
  <div class="form-group">
    <label for="titre">Aéroport :</label>
    <input type="text" name="aeroport" class="form-control" value="{{old('aeroport')}}" placeholder="code de l'aeroport">
  </div>
  
 
  <div class="form-group">
    <label for="desciption">Message/Commentaire :</label>
    <textarea name="msg" class="form-control" value="{{old('msg')}}" placeholder="Commentaire"></textarea> 
  </div>
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
    $("#ldeb").click(function(e){
        e.preventDefault();
         var car = $("#car").val();
         var dd = $("#dd").val();
         var dr= $("#dr").val();
        $.ajax({
           type:'GET',
           url:'/ajaxRequest',
           data:{name:car,dd:dd,dr:dr},
           success:function(data){
              alert(data.prix);
              prx=data.prix;
              $("#prix").val(prx);
             //prix=data.supplement;
              $("#x").html(data.sup);
           }
        });
    });
</script>

@endsection