@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('blog_posts') }}" >
           
				{{ csrf_field() }}
        <div class="form-group">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" value="{{$post->title}}" class="form-control" placeholder="Le nom de la voiture" required>
    

  </div>
        <div class="form-group">
  <label for="categorie">Categorie :</label>
  <select class="form-control" name="categorie">
  
  <option>{{$cat->name}}</option>
    
  </select>
</div>      
<div class="form-group">
    <label for="image">Image : </label>
    <input type="file" class="form-control-file" alt="{{$post->image}}" name="image">
  </div>
  
  <div class="form-group">
    <label for="titre">Alternatif :</label>
    <input type="text" name="alt" value="{{$post->image_alt}}" class="form-control" placeholder="Alternatif de l'image" required>
  </div>
  <div class="form-group">
    <label for="titre">Slug :</label>
    <input type="text" name="slug" value="{{$post->slug}}" class="form-control" placeholder="Le slug du post" required>
    

  </div>
  
  <div class="form-group">
    <label > Contenu :</label>
    <textarea name="body" class="form-control"  placeholder="Le contenu" required>{{$post->body}}</textarea> 
  </div>
  <div class="form-group">
    <label for="titre">Meta title :</label>
    <input type="text" name="metat" class="form-control" value="{{$post->meta_title}}" placeholder="Le titre pour le reférencement"required>
  </div>
  <div class="form-group">
    <label for="desciption">Meta description :</label>
    <textarea name="metad" class="form-control"  placeholder="La description pour le reférencement" required>{{$post->meta_description}}</textarea> 
  </div>
  <input type="submit" href="{{url('blog_posts') }}" class="btn btn-primary" value="Retour">
</form>
@endsection