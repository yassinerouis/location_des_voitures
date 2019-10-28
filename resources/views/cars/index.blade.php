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
			<h1>La Liste des Voitures</h1>
			<div class="pull-right">
				<a class="btn btn-warning" href="{{url('cars/create')}}">Nouveau voiture</a>
			</div>
			<table class="table">
  <thead>
    <tr>
    
      <th>Nom</th>
      <th>Image</th>
      <th>Type</th>
      
      <th>Nombre de places</th>
      <th>Nombre de portes</th>
      <th>Nombre de valises</th>
      <th>Climatisation</th>
      <th>Active</th>
      <th>Disponible</th>
      <th>Action</th>
    </tr>
  </thead>
  <body>
  	@foreach($cars as $c)
    <tr>
      <td>{{$c->Nom}}</td>
      <td><img width="100" hight="100" src="storage/{{ $c->image }}"></td>
      <td>{{$c->type}}</td>
      <td>{{$c->nombre_places}}</td>
      <td>{{$c->doors}}</td>
      <td>{{$c->air}}</td>
      <td>@if($c->climatise==0) Non @else Oui @endif</td>
      <td>@if($c->active==0) Non @else Oui @endif</td>
      <td>@if($c->disponible==0) Non @else Oui @endif</td>
      <td>
      <form action="{{url('cars/'.$c->id)}}">
      	<a href="{{url('cars/'.$c->id.'/details')}}" class="btn btn-primary">Détails</a>
      	<a href="{{url('cars/'.$c->id.'/edit')}}" class="btn btn-success">Editer</a>
      	{{csrf_field()}}
        {{method_field('DELETE')}}
      	<button type="submit" href class="btn btn-danger" onclick="return confirm('Vous étes sure que vous voullez supprimer cette voiture?')">Supprimer</button> 
      </form>
      </td>
    </tr>
    @endforeach
  </body>
  
</table>
		</div>
	</div>
</div>
@endsection