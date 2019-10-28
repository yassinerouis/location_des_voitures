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
			<h1>La Liste des Supplements</h1>
			<div class="pull-right">
				<a class="btn btn-warning" href="{{url('supplement_cars/create')}}">Nouveau supplement</a>
			</div>
			<table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Image</th>
      <th>Titre</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
  </thead>
  <body>
  	@foreach($cars as $c)
    <tr>
      <td>{{$c->name}}</td>
      <td><img width="100" hight="100" src="storage/{{ $c->image }}"></td>
      <td>{{$c->title}}</td>
      <td>{{$c->descrition}}</td>
     
      <td>
      <form action="{{url('supplement_cars/'.$c->id)}}">
      
      	{{csrf_field()}}
        {{method_field('DELETE')}}
      	<button type="submit" href class="btn btn-danger" onclick="return confirm('Vous étes sure que vous voullez supprimer ce supplement?')">Supprimer</button> 
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