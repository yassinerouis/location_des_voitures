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
			<h1>Boite de réception</h1>
			<div class="pull-right">
			
			</div>
			<table class="table">
  <thead>
    <tr>
      <th>Date</th>
      <th>Emetteur</th>
      <th>Sujet</th>
      
      <th>Message</th>
      <th>Action</th>
    </tr>
  </thead>
  <body>
  	@foreach($msgs as $c)
    <tr>
      <td>{{$c->updated_at}}</td>
      <td>{{$c->name}}</td>
      <td>{{$c->sujet}}</td>
      <td>{{$c->message}}</td>
      <td>
      	<form action="{{url('messages_re/'.$c->id)}}">
      	<a href="{{url('messages_re/'.$c->id.'/details_re')}}" class="btn btn-primary">Lire</a>
      	<a href="{{url('messages_re/'.$c->id.'/repondre')}}" class="btn btn-primary">Répondre</a>
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