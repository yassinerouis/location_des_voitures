@extends('layouts.app_client')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('messages_re')}}">
				{{ csrf_field() }}
        

    <div class="form-group">
    <label >Sujet :</label>
    <input type="text" name="sujet" value="{{$message->sujet}}" class="form-control" placeholder="Le sujet" required>
    </div>
    <div class="form-group">
    <label for="desciption">Message :</label>
    <textarea name="msg" class="form-control"placeholder="Le message" required> {{$message->message}} </textarea> 
  </div>
    


  <input type="submit" href="{{url('messages_re')}}" class="btn btn-primary" value="Retour">
</form>
@endsection