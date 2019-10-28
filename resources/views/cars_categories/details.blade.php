@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('categories') }}" >
           
				{{ csrf_field() }}
                <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" class="form-control" value="{{$categorie->nom}}" placeholder="Entrer le nom de la Catégorie">
    
  </div>
  <div class="form-group">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" class="form-control" value="{{$categorie->titre}}" placeholder="Entrer le titre de la page de la Catégorie">
    <div class="form-group">
    <label for="number">Nombre de voitures :</label>
    <input type="number" class="form-control" name="nombre" value="{{$categorie->nombre_de_voitures}}" min="1" max="80" required>
  </div>
  <div class="form-group">
    <label for="image">Image : </label>
    <input type="file" accept="image/png, image/jpeg" class="form-control-file" value="{{$categorie->image}}" name="image">
  </div>
  </div>
  <div class="form-group">
    <label for="desciption">Description :</label>
    <textarea name="desc" class="form-control" placeholder="Entrer la description de la Catégorie">{{$categorie->description}}</textarea> 
  </div>
  <label for="titre">Titre pour le référencement :</label>
    <input type="text" name="titre_ref" class="form-control" value="{{$categorie->titre_ref}}" placeholder="Entrer le titre ">
    <div class="form-group">
    <div class="form-group">
    <label for="desciption">Description pour le référencement :</label>
    <textarea name="desc_ref" class="form-control"  placeholder="Entrer la description">{{$categorie->description_ref}}</textarea> 
  </div>
  <input type="submit" href="{{url('categories') }}" class="btn btn-primary" value="Retour">
</form>
@endsection