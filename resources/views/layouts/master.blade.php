<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <body>
     <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
       <li><a href="{{url('accueil')}}">Accueil</a></li>
            <li><a href="{{url('service')}}">Service</a></li>
            <li><a href="{{url('contact')}}">Contact</a></li>
          </ul>
        </li>
      </ul>
      
      
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

@yield('content')

     <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('assets/bootstrap/jquery.min.js')}}"></script>
    </body>
</html>
