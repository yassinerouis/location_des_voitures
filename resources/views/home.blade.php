@extends('layouts.principal')

@section('contenu')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<br><br><br><br><br><br><br><br><br><br><br><br>
                <center><h1> Bienvenue cher Client </h1></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
