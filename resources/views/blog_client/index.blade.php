@extends('layouts.principal')
@section('contenu')
<div class="container" id="app">
  <h2><br><br><br><br><br>Les Articles</h2>
  <div class="panel-group">
  </div>
<h1></h1>
@foreach($posts as $p)

    <div class="panel panel-primary">
      <div class="panel-heading">
      {{$p->title}}
      </div>
      <div class="row">
      <div class="col-md-1"></div>
  <div class="col-md-10">
  <div class="panel-body"><div class="thumbnail">
      <img width="60%" hight="60%" src="storage/{{$p->image}}">
      <div class="caption">
  </div>
    
</div>{{$p->body}}</div>
  
  <ul class="list-group" >Commentaires:
  @foreach($comments as $c)
  @if($c->blog_posts_id==$p->id)
    <li class="list-group-item">
      <p>{{$c->texte}}</p>
      <small>à : {{$c->updated_at}}</small>
    </li>
    @endif
    @endforeach
  </ul>

  <div class="row" >
    
    
    <div id="comment{{$p->id}}" class="col-md-10" style="display:none">
    <form method="post" action="{{url('blog_comments')}}">
    {{ csrf_field() }}

    <input type="hidden" name="article" value="{{$p->id}}">
  <div class="form-group">
    <label for="titre">Nom :</label>
    <input type="text" name="nom" class="form-control" placeholder="Le nom du commentaire" required>
  </div>
  <div class="form-group">
    <label for="titre">Email :</label>
    <input type="email" name="email" class="form-control" placeholder="votre mail" required>
  </div>
  <div class="form-group">
    <label for="desciption">Texte :</label>
    <textarea name="texte" class="form-control" placeholder="Le commentaire" required></textarea> 
  </div>
  <input type="submit" class="btn btn-primary" value="Commenter">
  </form>
  <a class="btn btn-danger" onclick="masquer({{$p->id}})" >Masquer le formulaire</a>
</div>

</div>
<div class="col-md-1"></div>
  </div>

  <div class="col-md-2"><a onclick="comment({{$p->id}})" class="btn btn-success">Ajouter Commentaire</a></div>
    </div>
    @endforeach
  </div>
</div>
@endsection
<script>
function comment(id){
  $('#comment'+id).css('display','block');
}
function masquer(id){
  $('#comment'+id).css('display','none');
}
</script>
