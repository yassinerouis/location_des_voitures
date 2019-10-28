@extends('layouts.principal')
@section('contenu')
<div class="container">
	<div class="row">
		<div class="col-md-12">
    @if(session()->has('success'))
    <div class="alert alert-success col-md-8 col-md-offset-2">
    {{session()->get('success')}}
    </div>
    @endif
			<h1>La Liste des publications </h1>
      <div class="row">
      @foreach($posts as $c)
  <div class="col-xs-6 col-md-6">
    <div class="thumbnail">
      <img width="250" higth="250" src="{{$c->image}}" >
      <div class="caption">
      <h3>Publication {{$c->title}}</h3>
      <p>Date :{{$c->updated_at}}</p>
      <p>
      <a href="{{url('blog_posts/'.$c->id.'/consulter')}}" class="btn btn-primary" role="button">Consulter</a>
      </p>
    </div>
  </div>
</div>
@endforeach
</div>

		</div>
	</div>
</div>
@endsection
@section('javascripts')
<script src="js/Vue.js">

</script>

<script>
  
var app=new Vue({
    el:'#app',
    data:{
    message:'hello'
    }
});
</script>
@endsection