@extends('layouts.app')
@section('content')
<!--main-container-part-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{url('cities')}}">
				{{ csrf_field() }}
                
                <div class="form-group">
    <label >Nom :</label>
    <input type="text" name="nom" value="{{$citie->name}}" class="form-control" placeholder="nom de la ville" required>
    </div>

    <div class="form-group">
    <label >Nom page :</label>
    <input type="text" name="page"  value="{{$citie->slug}}"  class="form-control" placeholder=" nom de la page" required>
    </div>
    <div class="form-group">
    <label for="titre">Alternatif :</label>
    <input type="text" name="alt"  value="{{$citie->image_alt}}" class="form-control" placeholder="Alternatif de l'image" required>
    </div>  
    <div class="form-group">
    <label >Image :</label>
    <input type="file" class="form-control-file" value="{{$citie->image}}" name="image">
    </div>
    <div class="form-group">
    <label for="titre">Prix :</label>
    
    <input type="number" value="{{$citie->price}}" step="any" class="form-control" placeholder="Prix de cette ville" name="prix">
    </div>
    

    


  <input type="submit" href="{{url('cities')}}" class="btn btn-primary" value="Retour">
</form>
@endsection