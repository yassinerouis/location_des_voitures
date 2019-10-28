@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('messages')}}" method="post">
				{{ csrf_field() }}
                
        <div class="form-group">
  <label for="categorie">Client :</label>
  <select class="form-control" name="user">
  @foreach($users as $c2)
  <option value="{{$c2->id}}">{{$c2->name}} </option>
    @endforeach
  </select>
</div>

    <div class="form-group">
    <label >Sujet :</label>
    <input type="text" name="sujet" class="form-control" placeholder="Le sujet" required>
    </div>
    <div class="form-group">
    <label for="desciption">Message :</label>
    <textarea name="msg" class="form-control" placeholder="Le message" required></textarea> 
  </div>
  
 
    
    

    


  <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>
@endsection