<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RajiCars - Page principale</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Medilab
    Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#banner">Accueil</a></li>
                <li class=""><a href="#service">Services</a></li>
                <li class=""><a href="#about">A propos de nous</a></li>
                <li class=""><a href="#contact">Contact</a></li>
                @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                </div>
                            </li>
                            <li class="nav-item" ><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>

                        @endguest
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="img/logo.png" class="img-responsive">
            </div>
            <div class="banner-text text-center">
              <h1 class="white">Rajicars</h1>
              <p>Le script de Location de voiture le plus flexible</p>
              <a href="{{url('cars')}}" class="btn btn-appoint">Catalogue des voitures</a>
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Nos services</h2>
          <hr class="botm-line">
          <p>Il n’a jamais été aussi facile et rapide de louer sa voiture au Maroc. 
                Avis est le spécialiste de la location de voiture qu’il vous faut. 
               Notre agence est idéalement située en centre-ville ou à proximité des aéroports pour vous faciliter la vie ! 
               Consultez notre site pour voir les voitures présentes et faites votre choix.
                Depuis plusieurs années, Avis vous accompagne dans la location de voiture au Maroc. 
                Son expertise et son expérience en fait un acteur de référence. 
                Comme nos nombreux clients, vous pouvez nous faire confiance pour votre location de voiture.</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <div class="icon-info">
              <h4><a href="#">voitures</a></h4>
              
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa fa-key"></i>
            </div>
            <div class="icon-info">
              <h4> <a href="{{url('reservations')}}">Réservations</a></h4>
             
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <div class="icon-info">
              <h4><a href="{{url('reservations')}}">Administration</a></h4>
              <p></p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-comments"></i>
            </div>
            <div class="icon-info">
              <h4><a href="{{url('blog_posts')}}">Articles</a></h4>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ service-->
  <!--cta-->
  <section id="cta-1" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="schedule-tab">
          <div class="col-md-4 col-sm-4 bor-left">
            <div class="mt-boxy-color"></div>
            <div class="medi-info">
              <h3>Contact</h3>
              <br>
              <br>
              <p>Contactez nous sur :</p>
              <br>
              <br>
              <br>
              <br>
              <a href="#contact" class="medi-info-btn">CONTACTS</a>
             
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="medi-info">
              <h3>Services</h3>
              <br>
              <br>
              <p>Description globale de nos services :
              <br>
              <br>
              <br>
              <br>
             </p>
              <a href="#about" class="medi-info-btn">SERVICES</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 mt-boxy-3">
            <div class="mt-boxy-color"></div>
            <div class="time-info">
              <h3>Heures de travail</h3>
              <table style="margin: 8px 0px 0px border=1">
                <tbody>
                  <tr>
                    <td>Monday - Friday</td>
                    <td>8.00 - 17.00</td>
                  </tr>
                  <tr>
                    <td>Saturday</td>
                    <td>9.30 - 17.30</td>
                  </tr>
                  <tr>
                    <td>Sunday</td>
                    <td>9.30 - 15.00</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--about-->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="section-title">
            <h2 class="head-title lg-line">Qu'est ce que vous connaissez à propos de nous ?</h2>
           
          </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12">
          <div style="visibility: visible;" class="col-sm-9 more-features-box">
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>Rajicars</h3>
                <p>RAJI CARS, avec un groupe commercial, jeune, énergique et disponible à tout moment a pour activité principale: la location de voitures légères, 4x4, minibus et bus climatisés. Grâce aux voitures haut de gamme, neuves et très bien entretenues; et avec l'aide de chauffeurs expérimentés, RAJI CARS dispose de moyens de communication crédibles pour rester en contact à tout moment. En cas de panne, votre voiture est immédiatement remplacée dans les 24 heures. Nous avons également la possibilité de vous louer des voitures dans toutes les villes du Maroc à l'endroit, à l'heure et le jour de votre convenance; et votre voiture vous attendra à l'aéroport de votre choix. Avec plusieurs années d'expérience dans le secteur de la location de voitures au Maroc, l'agence RAJI CARS propose des prix abordables à court ou à long terme. Pour plus d'informations n'hésitez pas à nous contacter. Pourquoi choisir RAJI CARS? Nouvelles voitures; Les assurances (tous risques) sont incluses dans le prix. Le kilométrage est illimité.</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ about-->
  <!--doctor team-->
  <section id="doctor-team" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Autres ...</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
           
            <div class="caption">
              <h3>NAVIGATION GPS</h3>
<p>Louer un véhicule sans GPS est un peu gênant, c'est dans ce but que notre agence met à disposition des GPS de navigation en location à partir de 5€/jour.</p>
             
             
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            
            <div class="caption">
              <h3>TRANSFERT AÉROPORT</h3>
<p>Avantage cars assure vos transferts depuis l'aéroport vers votre Hôtel, riad ou au lieu de résidence. Ces frais sont facturables et varies selon la ville de destination.</p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <div class="caption">
            <h3>BARRES DE TOIT</h3>
<p>Vous étes surfeur? Nous vous inquiétez pas, Nous vous livrons des véhicules avec barres de toit et ce sans frais supplémnetaires.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
           
            <div class="caption">
              <h3>SIÉGE ENFANT</h3>
<p>Nous veillons sur la sécurité de votre enfant et aussi de son confort, en vous livrant le véhicule de location à prix pas cher équipé d'un siège enfant sans aucun ...</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ doctor team-->
  <!--testimonial-->
  <section id="testimonial" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Commentaires sur nos services</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Alex<span>Texas</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Alex<span>Texas</span></h3>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="testi-details">
            <!-- Paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="testi-info">
            <!-- User Image -->
            <a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
            <!-- User Name -->
            <h3>Alex<span>Texas</span></h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ testimonial-->
  <!--cta 2-->
  <section id="cta-2" class="section-padding">
    <div class="container">
      <div class=" row">
        <div class="col-md-2"></div>
        <div class="text-right-md col-md-4 col-sm-4">
          <h2 class="section-title white lg-line">« Des mots<br> à propos <br>de nous »</h2>
        </div>
        <div class="col-md-4 col-sm-5">
         <p>RAJI CARS, avec un groupe commercial, jeune, énergique et disponible à tout moment a pour activité principale: la location de voitures légères, 4x4, minibus et bus climatisés. Grâce aux voitures haut de gamme, neuves et très bien entretenues; et avec l'aide de chauffeurs expérimentés, RAJI CARS dispose de moyens de communication crédibles pour rester en contact à tout moment. En cas de panne, votre voiture est immédiatement remplacée dans les 24 heures. Nous avons également la possibilité de vous louer des voitures dans toutes les villes du Maroc à l'endroit, à l'heure et le jour de votre convenance; et votre voiture vous attendra à l'aéroport de votre choix. Avec plusieurs années d'expérience dans le secteur de la location de voitures au Maroc, l'agence RAJI CARS propose des prix .</p>
          <p class="text-right text-primary"><i>— Présentation</i></p>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--contact-->
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Contact us</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <h3>Contact Info</h3>
          <div class="space"></div>
          <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Route Biougra <br> Ait Melloul - Maroc</p>
          <div class="space"></div>
          <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>contact@rajicars.com</p>
          <div class="space"></div>
          <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+212 528 24 76 14</p>
        </div>
        <div class="col-md-8 col-sm-8 marb20">
          <div class="contact-info">
            <h3 class="cnt-ttl">Localisation</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3443.2246016858135!2d-9.497665014305928!3d30.34456611128879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3c63539c6099b%3A0xc32e6115088b1a4f!2sRaji+Web+-+Agence+De+Marketing+Digital!5e0!3m2!1sar!2sma!4v1564153887504!5m2!1sar!2sma" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ contact-->
  <!--footer-->
  <footer id="footer">
    
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
          © 2019 | Raji Cars
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medilab
              -->
              Réalisé par <a href="https://rajiweb.com/">Rajiweb</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
