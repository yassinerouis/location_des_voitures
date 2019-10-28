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
				<a class="btn btn-warning" href="{{url('blog_categories/create')}}">Nouvelle Catégorie</a>
			</div>
			<table class="table">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Titre</th>
      <th>Slug</th>
      <th>Description</th>
     
    </tr>
  </thead>
  <body>
  	@foreach($categories as $c)
    <tr>
      <td>{{$c->name}}</td>
      <td>{{$c->meta_title}}</td>
      <td>{{$c->slug}}</td>
      <td>{{$c->meta_description}}</td>
      
      <td>
      	<form action="{{url('blog_categories/'.$c->id)}}">
      	<a href="{{url('blog_categories/'.$c->id.'/details')}}" class="btn btn-primary">Détails</a>
      	<a href="{{url('blog_categories/'.$c->id.'/edit')}}" class="btn btn-success">Editer</a>
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