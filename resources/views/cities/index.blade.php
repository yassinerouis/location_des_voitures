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
			<h1>La Liste des Villes</h1>
			<div class="pull-right">
				<a class="btn btn-warning" href="{{url('cities/create')}}">Nouvelle ville</a>
			</div>
			<table class="table">
  <thead>
    <tr>
      <th>Nom ville</th>
      <th>Titre page</th>
      <th>Prix</th>
      
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <body>
  	@foreach($cities as $c)
    <tr>
      <td>{{$c->name}}</td>
      <td>{{$c->slug}}</td>
      <td>{{$c->price}}</td>
      <td><img width="100" hight="100" src="storage/{{ $c->image }}"></td>
     
      
      
      <td>
      	<form action="{{url('cities/'.$c->id)}}">
      	<a href="{{url('cities/'.$c->id.'/details')}}" class="btn btn-primary">Détails</a>
      	<a href="{{url('cities/'.$c->id.'/edit')}}" class="btn btn-success">Editer</a>
      
      	{{csrf_field()}}
        {{method_field('DELETE')}}
      	<button type="submit" href class="btn btn-danger" onclick="return confirm('Vous étes sure que vous voullez supprimer cette ville?')">Supprimer</button> 
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