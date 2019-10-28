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
			<h1>La Liste des Commentaires</h1>
			<div class="pull-right">
				<a class="btn btn-warning" href="{{url('blog_comments/create')}}">Nouveau commentaire</a>
			</div>
			<table class="table">
  <thead>
    <tr>
    
      
      <th>  Nom </th>
     
      
      <th>Email</th>
      <th>Article</th>
      
      <th>Texte</th>
      <th>Date</th>
      <th>Active</th>
      <th>Action</th>
    </tr>
  </thead>
  <body>
  	@foreach($comments as $c)
    <tr>
    <td>{{$c->name}}</td>
      <td>{{$c->email}}</td>
      
      <td>{{$c->title}}</td>
      <td>{{$c->texte}}</td>
      <td>{{$c->updated_at}}</td>
      <td>{{$c->active}}</td>
     
     
      <td>
      <form action="{{url('blog_comments/'.$c->id)}}">
      	<a href="{{url('blog_comments/'.$c->id.'/details')}}" class="btn btn-primary">Détails</a>
      	<a href="{{url('blog_comments/'.$c->id.'/edit')}}" class="btn btn-success">Editer</a>
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