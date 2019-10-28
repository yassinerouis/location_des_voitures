@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('blog_categories')}}" method="post">
				{{ csrf_field() }}
                <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" class="form-control" placeholder="Entrer le nom de la Catégorie" required>
  </div>
  <div class="form-group">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" class="form-control" placeholder="Entrer le titre de la Catégorie" required>
    <div class="form-group">
    <label for="number">Slug :</label>
    <input type="text" name="slug" class="form-control" placeholder="Entrer le slug de la Catégorie" required>
  </div>
  </div>
  <div class="form-group">
    <label for="desciption">Description :</label>
    <textarea name="desc" class="form-control" placeholder="Entrer la description de la Catégorie"></textarea> 
  </div>
  <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>
@endsection