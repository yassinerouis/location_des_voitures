@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('cars/'.$car->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
				{{ csrf_field() }}
				
                <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" value="{{$car->nom}}" class="form-control" placeholder="Le nom de la voiture" required>
    

  </div>
  
  <div class="form-group">
  <label for="sel1">Type :</label>
  <select class="form-control" name="type">
    <option>{{$car->type}}</option>
   
  </select>
</div>

<div class="form-group">
    <label for="image">Image : </label>
    <input type="file" class="form-control-file" name="image" alt="{{$car->image}}">
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
    <select  class="form-control" name="active">
    <option @if($car->active==0) value="0" @else value="1" @endif>@if($car->active==0)Non @else Oui @endif</option>
    <option @if($car->active==0) value="1" @else value="0" @endif>@if($car->active==1)Non @else Oui @endif</option>
    </select>
  </div>
  <div class="form-group">
    <label for="number">Disponible :</label>
    <select  class="form-control" name="disponible">
    <option @if($car->disponible==0) value="0" @else value="1" @endif>@if($car->disponible==0)Non @else Oui @endif</option>
    <option @if($car->disponible==0) value="1" @else value="0" @endif>@if($car->disponible==1)Non @else Oui @endif</option>
    </select>
  </div>
  <div class="form-group">
    <label for="number">climatisée :</label>
    <select  class="form-control" name="climat">
    <option @if($car->climatise==0) value="0" @else value="1" @endif>@if($car->climatise==0)Non @else Oui @endif</option>
    <option @if($car->climatise==0) value="1" @else value="0" @endif>@if($car->climatise==1)Non @else Oui @endif</option>
    </select>
  </div>
  <input type="submit" class="btn btn-primary" value="Enregistrer">
</form>
@endsection