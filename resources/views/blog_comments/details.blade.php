@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('blog_comments') }}" >
           
				{{ csrf_field() }}
        <div class="form-group">
  <label for="categorie">Publié :</label>
  <select class="form-control" name="active">
  
  <option>{{$com->active}}</option>

   
  </select>
</div>

                <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" value="{{$com->name}}" class="form-control" placeholder="Le nom du commentaire" required>
  </div>
  
  
<div class="form-group">
  <label for="categorie">Article :</label>
  <select class="form-control" name="article">
  
  <option value="{{$post->id}}">{{$post->title}}</option>
   
  </select>
</div>

  
  <div class="form-group">
    <label for="titre">Email :</label>
    <input type="email" name="email" value="{{$com->email}}" class="form-control" placeholder="votre mail" required>
  </div>
  
  <div class="form-group">
    <label for="desciption">Texte :</label>
    <textarea name="texte" class="form-control" placeholder="Le commentaire" required>{{$com->texte}}</textarea> 
  </div>
  <input type="submit" href="{{url('blog_comments') }}" class="btn btn-primary" value="Retour">
</form>
@endsection