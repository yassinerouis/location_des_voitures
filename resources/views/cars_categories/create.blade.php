@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('categories')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
                <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" class="form-control" placeholder="Entrer le nom de la Catégorie" required>
    
  </div>
  <div class="form-group">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" class="form-control" placeholder="Entrer le titre de la page de la Catégorie" required>
    <div class="form-group">
    <label for="number">Nombre de voitures :</label>
    <input type="number" class="form-control" name="nombre" value="1" min="1" max="80" required>
  </div>
  <div class="form-group">
    <label for="image">Image : </label>
    <input type="file" class="form-control-file" name="image">
  </div>
  </div>
  <div class="form-group">
    <label for="desciption">Description :</label>
    <textarea name="desc" class="form-control" placeholder="Entrer la description de la Catégorie"></textarea> 
  </div>
  <label for="titre">Titre pour le référencement :</label>
    <input type="text" name="titre_ref" class="form-control" placeholder="Entrer le titre " required>
    <div class="form-group">
    <div class="form-group">
    <label for="desciption">Description pour le référencement :</label>
    <textarea name="desc_ref" class="form-control" placeholder="Entrer la description" required></textarea> 
  </div>
  <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>
@endsection