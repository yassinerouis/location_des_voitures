@extends('layouts.principal')
@section('contenu')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
    @if(session()->has('success'))
    <div class="alert alert-success col-md-8 col-md-offset-2">
    {{session()->get('success')}}
    </div>
    @endif
		
			<div class="pull-right">
      <a class="btn btn-success" href="{{url('messages_re')}}">Boite de réception</a>
				<a class="btn btn-warning" href="{{url('messages/create')}}">Nouveau message</a>
			</div>
			<table class="table">	<h1>Boite d'envoie</h1>
  <thead> 
    <tr>
      <th>Date</th>
      <th>Destinataire</th>
      <th>Sujet</th>
      <th>Message</th>
      <th>Action</th>
    </tr>
  </thead>
  <body>
  	@foreach($msgs as $c)
    <tr>
      <td>{{$c->updated_at}}</td>
      <td>Administration Rajicars</td>
      <td>{{$c->sujet}}</td>
      <td>{{$c->message}}</td>
      <td>
      	<form action="{{url('messages/'.$c->id)}}">
      	<a href="{{url('messages/'.$c->id.'/details')}}" class="btn btn-primary">Lire</a>
      	
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