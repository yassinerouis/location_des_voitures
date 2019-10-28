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
			<h1>La Liste des Catégories</h1>
			<div class="pull-right">
				<a class="btn btn-warning" href="{{url('categories/create')}}">Nouvelle Catégorie</a>
			</div>
			<table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Titre</th>
      <th>Nombre des voitures</th>
      <th>Description</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <body>
  	@foreach($categories as $c)
    <tr>
      <td>{{$c->nom}}</td>
      <td>{{$c->titre}}</td>
      <td>{{$c->nombre_de_voitures}}</td>
      <td>{{$c->description}}</td>
      <td><img width="100" hight="100" src="storage/{{ $c->image }}"></td>
      
      <td>
      	<form action="{{url('categories/'.$c->id)}}">
      	<a href="{{url('categories/'.$c->id.'/details')}}" class="btn btn-primary">Détails</a>
      	<a href="{{url('categories/'.$c->id.'/edit')}}" class="btn btn-success">Editer</a>
      	{{csrf_field()}}
        {{method_field('DELETE')}}
      	<button type="submit" onclick="return confirm('Vous étes sure que vous voullez supprimer cette categorie?')" href class="btn btn-danger">Supprimer</button> 
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