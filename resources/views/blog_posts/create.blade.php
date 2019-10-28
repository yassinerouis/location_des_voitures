@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('blog_posts')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
                <div class="form-group">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" class="form-control" placeholder="Le nom de l'article" required>

  </div>
<div class="form-group">
  <label for="categorie">Categorie :</label>
  <select class="form-control" name="categorie">
  @foreach($categories as $c)
  <option value="{{$c->id}}">{{$c->name}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
    <label for="image">Image : </label>
    <input type="file" class="form-control-file" name="image">
  </div>
  
  <div class="form-group">
    <label for="titre">Alternatif :</label>
    <input type="text" name="alt" class="form-control" placeholder="Alternatif de l'image" required>
  </div>
  <div class="form-group">
    <label for="titre">Slug :</label>
    <input type="text" name="slug" class="form-control" placeholder="Le slug du post" required>
    

  </div>
  
  <div class="form-group">
    <label > Contenu :</label>
    <textarea name="body" class="form-control" placeholder="Le contenu" required></textarea> 
  </div>
  <div class="form-group">
    <label for="titre">Meta title :</label>
    <input type="text" name="metat" class="form-control" placeholder="Le titre pour le reférencement"required>
  </div>
  <div class="form-group">
    <label for="desciption">Meta description :</label>
    <textarea name="metad" class="form-control" placeholder="La description pour le reférencement" required></textarea> 
  </div>
  <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>
@endsection