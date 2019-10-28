@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('cars')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
                <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" class="form-control" placeholder="Le nom de la voiture" required>
    

  </div>
  
  <div class="form-group">
  <label for="sel1">Type :</label>
  <select class="form-control" name="type">
    <option>Diesel</option>
    <option>Essence</option>
  </select>
</div>
<div class="form-group">
  <label for="categorie">Categorie :</label>
  <select class="form-control" name="categorie">
  @foreach($categories as $c)
  <option value="{{$c->id}}">{{$c->nom}}</option>
    @endforeach
  </select>
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
    <label for="number">Nombre de places :</label>
    <input type="number" class="form-control" name="nbplaces" value="2" min="2" max="10" required>
  </div>
  <div class="form-group">
    <label for="number">Nombre de portes :</label>
    <input type="number" class="form-control" name="nbportes" value="2" min="2" max="6" required>
  </div>
  <div class="form-group">
    <label for="number">Nombre de bags :</label>
    <input type="number" class="form-control" name="nbbags" value="2" min="2" max="6" required>
  </div>
  <div class="form-group">
    <label for="number">Nombre de valises :</label>
    <input type="number" class="form-control" name="nbvalises" value="2" min="2" max="6" required>
  </div>
  <div class="form-group">
    <label for="number">Prix par jour :</label>
    <input type="number" class="form-control" name="price" value="0" min="0" max="10000" required>
  </div>
  <div class="form-group">
    <label for="number">Active :</label>
    <select class="form-control" name="active">
  <option value="0">Non</option>
  <option value="1">Oui</option>
  </select>
  </div>
  <div class="form-group">
    <label for="number">Disponible :</label>
    <select class="form-control" name="disponible">
  <option value="0">Non</option>
  <option value="1">Oui</option>
  </select>
  </div>
  <div class="form-group">
    <label for="number">climatisée :</label>
    <select class="form-control" name="climat">
  <option value="0">Non</option>
  <option value="1">Oui</option>
  </select>
  </div>
  
  <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>
@endsection