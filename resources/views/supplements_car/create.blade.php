@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('supplement_cars')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
        <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" class="form-control" placeholder="Nom du supplement"required>
  </div>
  <div class="form-group">
    <label for="titre">Titre :</label>
    <input type="text" name="titre" class="form-control" placeholder="Titre du supplement"required>
  </div>
  <div class="form-group">
  <label for="categorie">Voiture :</label>
  <select class="form-control" name="car">
  @foreach($cars as $c1)
  <option value="{{$c1->id}}">{{$c1->Nom}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
    <label for="number">Prix :</label>
    <input type="number" class="form-control" name="prix" required >
   
  </div>
<div class="form-group">
    <label for="titre">Slug :</label>
    <input type="text" name="slug" class="form-control" placeholder="Slug" required>
  </div>

<div class="form-group">
    <label for="image">Image : </label>
    <input type="file" class="form-control-file" name="image">
  </div>
  
  <div class="form-group">
    <label for="titre">Alternatif :</label>
    <input type="text" name="alt" class="form-control" placeholder="Alternatif de l'image"required>
  </div>
  <div class="form-group">
    <label for="desciption">Description :</label>
    <textarea name="desc" class="form-control" value="{{old('msg')}}" placeholder="Description du supplement"></textarea> 
  </div>
  
  <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>
@endsection