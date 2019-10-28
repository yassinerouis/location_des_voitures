@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('blog_comment')}}" method="post">
				{{ csrf_field() }}
        <div class="form-group">
  <label for="categorie">Publié :</label>
  <select class="form-control" name="active">
  
  <option>non</option>
  <option>oui</option>
   
  </select>
</div>

                <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" class="form-control" placeholder="Le nom du commentaire" required>
  </div>
  
  
<div class="form-group">
  <label for="categorie">Article :</label>
  <select class="form-control" name="article">
  @foreach($posts as $c)
  <option value="{{$c->id}}">{{$c->title}}</option>
    @endforeach
  </select>
</div>

  
  <div class="form-group">
    <label for="titre">Email :</label>
    <input type="email" name="email" class="form-control" placeholder="votre mail" required>
  </div>
  
  <div class="form-group">
    <label for="desciption">Texte :</label>
    <textarea name="texte" class="form-control" placeholder="Le commentaire" required></textarea> 
  </div>
  <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>
@endsection