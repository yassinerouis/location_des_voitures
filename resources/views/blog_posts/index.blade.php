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
			<h1>La Liste des Articles</h1>
			<div class="pull-right">
				<a class="btn btn-warning" href="{{url('blog_posts/create')}}">Nouveau article</a>
			</div>
			<table class="table">
  <thead>
    <tr>

      <th>Image</th>
     
      
      <th>Titre</th>
      <th>Contenu</th>
      
      <th>Action</th>
    </tr>
  </thead>
  <body>
  	@foreach($posts as $c)
    <tr>
    <td><img width="100" hight="100" src="storage/{{ $c->image }}"></td>
      <td>{{$c->title}}</td>
      <td>{{$c->body}}</td>
      <td>
      <form action="{{url('blog_posts/'.$c->id)}}">
      	<a href="{{url('blog_posts/'.$c->id.'/details')}}" class="btn btn-primary">Détails</a>
      	<a href="{{url('blog_posts/'.$c->id.'/edit')}}" class="btn btn-success">Editer</a>
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