@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('blog_categories') }}" >
           
				{{ csrf_field() }}
                <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" class="form-control" value="{{$categorie->name}}" placeholder="Entrer le nom de la Catégorie">
    
  </div>
  <div class="form-group">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" class="form-control" value="{{$categorie->meta_title}}" placeholder="Entrer le titre de la page de la Catégorie">
    
  </div>
  <div class="form-group">
    <label for="number">Slug :</label>
    <input type="text" name="titre" class="form-control" value="{{$categorie->slug}}" placeholder="Entrer le slug de la Catégorie" required>
  </div>
  <div class="form-group">
    <label for="desciption">Description :</label>
    <textarea name="desc" class="form-control" placeholder="Entrer la description de la Catégorie">{{$categorie->meta_description}}</textarea> 
  </div>
  
  <input type="submit" href="{{url('categories') }}" class="btn btn-primary" value="Retour">
</form>
@endsection