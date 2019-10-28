@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('messages')}}">
				{{ csrf_field() }}
        <div class="form-group">
  <label for="categorie">Client :</label>
  <select class="form-control" name="user">
 
  <option value="{{$user->id}}">{{$user->name}}</option>
    
  </select>
</div>

    <div class="form-group">
    <label >Sujet :</label>
    <input type="text" name="sujet" value="{{$message->sujet}}" class="form-control" placeholder="Le sujet" required>
    </div>
    <div class="form-group">
    <label for="desciption">Message :</label>
    <textarea name="msg" class="form-control"placeholder="Le message" required> {{$message->message}} </textarea> 
  </div>
    


  <input type="submit" href="{{url('messages')}}" class="btn btn-primary" value="Retour">
</form>
@endsection