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
      <div class="row"><h1>La Liste des Voitures</h1>
      <h2>Catégorie : <br><br><select id="cat" class="form-control form-control-lg"> @foreach($categ as $cat)<option value="{{$cat->id}}">{{$cat->nom}}</option>@endforeach<
</select><br><br></h2>
<div id="rech"> 
      @foreach($cars as $c)
  <div  class="col col-12 col-md-6 col-lg-6">
    <div class="thumbnail" >
     
    
      <div class="card" style="width: 18rem;">
       <img class="card-img-top" height="300px" width="400px" src="storage/{{$c->image}}"> 
                <div class="card-body">
                  <h5 class="card-title">Voiture {{$c->Nom}}</h5>
                  <p class="card-text">Type : Voiture {{$c->type}}</p>
                  <center><a href="{{url('reserver/'.$c->id)}}" class="btn btn-warning">Réserver</a><center>
                  
                </div>
              </div>
      
      
   
  </div>

</div>
@endforeach
</div>

		</div>
	</div>
</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#cat").change(function(e){
        e.preventDefault();
         var cat = $("#cat").val();
         alert("heloo");
        $.ajax({
           type:'GET',
           url:'/ajaxCars',
           data:{name:cat},
           success:function(data){
             
               $('#rech').html(data.html);
           }
        });
    });
</script>

@endsection