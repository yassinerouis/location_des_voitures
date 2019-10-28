@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('cars') }}" >
           
				{{ csrf_field() }}
                <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" value="{{$car->nom}}" class="form-control" placeholder="Le nom de la voiture">
    

  </div>
  
  <div class="form-group">
  <label for="sel1">Type :</label>
  <select class="form-control" name="type">
    <option>{{$car->type}}</option>
   
  </select>
</div>

<div class="form-group">
    <label for="image">Image : </label>
    <input type="file" class="form-control-file" name="image">
  </div>
  
  <div class="form-group">
    <label for="titre">Alternatif :</label>
    <input type="text" name="alt" value="{{$car->image_alt}}" class="form-control" placeholder="Alternatif de l'image">
  </div>
    <div class="form-group">
    <label for="number">Nombre de places :</label>
    <input type="number" class="form-control" value="{{$car->nombre_places}}" name="nbplaces" min="2" max="10" required>
  </div>
  <div class="form-group">
    <label for="number">Nombre de portes :</label>
    <input type="number" class="form-control" name="nbportes"  value="{{$car->doors}}"  min="2" max="6" required>
  </div>
  <div class="form-group">
    <label for="number">Nombre de bags :</label>
    <input type="number" class="form-control" name="nbbags"  value="{{$car->bags}}"  min="2" max="6" required>
  </div>
  <div class="form-group">
    <label for="number">Nombre de valises :</label>
    <input type="number" class="form-control" name="nbvalises"  value="{{$car->air}}" min="2" max="6" required>
  </div>
  <div class="form-group">
    <label for="number">Active :</label>
    <select  class="form-control">
    <option >@if($car->active==0)Non @else Oui @endif</option>
    </select>
  </div>
  <div class="form-group">
    <label for="number">Disponible :</label>
    <select  class="form-control">
    <option >@if($car->disponible==0)Non @else Oui @endif</option>
    </select>
  </div>
  <div class="form-group">
    <label for="number">climatisée :</label>
    <select  class="form-control">
    <option >@if($car->climatise==0)Non @else Oui @endif</option>
    </select>
  </div>
  <input type="submit" href="{{url('cars') }}" class="btn btn-primary" value="Retour">
</form>
@endsection