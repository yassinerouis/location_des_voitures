<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <style media="screen">
        body * {
            margin: 0;
            padding: 0;
        }
        p,
        table td,
        table th {
            font-family: Verdana,Geneva,sans-serif;
            font-size: 12px;
        }
        h1 {
            font-family: Verdana,Geneva,sans-serif;
            font-size: 40px;
        }
        </style>
    </head>
    <body>
        @foreach($reservation as $res)
        <div  style="padding:20px">

            <!-- Heading -->
            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td width="50%">
                        <img src="img/logo.png"  width="200px" height="100px">
                    </td>
                    <td width="50%">
                        <p align="right">Facture N° : {{$res->id}}</p>
                        <p align="right">Le {{$res->updated_at}}</p>
                    </td>
                </tr>
            </table>

            <!-- Spacing -->
            <table><tr><td height="20px">&nbsp;</td></tr></table>

            <!-- Title -->
            <h1 align="center" style="color:#185484">Facture</h1>

            <!-- Spacing -->
            <table><tr><td height="50px">&nbsp;</td></tr></table>

            <!-- Client & status -->
            <table cellspacing="0" width="100%">
                <tr>
                    <td width="50%" style="width:50%; padding:10px; border:2px solid #4285f4">
                        <strong>Client:</strong> {{$res->name}}
                    </td>
                   
                    <td width="10%">&nbsp;</td>
                    <td width="30%" style="width:50%; padding:10px; border:2px solid #4285f4">
                        <strong>Etat :</strong> @if($res->has_paid=='oui') Payé @else Non Payé @endif
                    </td>
                </tr>
            </table>

            <!-- Objet -->
            <table>
                <tr>
                    <td height="150px">
                        <strong>Objet : </strong> Réservation d'une voiture de <strong>{{$res->date_debut}}</strong> au <strong>{{$res->date_fin}}</strong>
                    </td>
                </tr>
            </table>

            <!-- Designations -->
            <table cellspacing="0" width="100%" border="0" align="center" style="border-collapse:collapse">
                <tr bgcolor="#0a304e">
                    <th width="50" style="color:#fff; border:1px solid #2196f3">N° des prix</th>
                    <th style="color:#fff; border:1px solid #2196f3">Désignation</th>
                    <th width="100" style="color:#fff; border:1px solid #2196f3">Unité</th>
                    
                  
                    <th width="200" style="color:#fff; border:1px solid #2196f3">Prix Total HT (DH)</th>
                </tr>
                <tr height="300px" align="center">
                    <td style="border:1px solid #2196f3">1</td>
                    <td style="border:1px solid #2196f3">
                        Réservation de voiture<br>
                        <strong style="color:#4285f4">{{$res->Nom}}</strong>
                    </td>
                    <td style="border:1px solid #2196f3">jour</td>
                    <td style="border:1px solid #2196f3">{{$res->prix_total}}</td>
                </tr>
               
               
            </table>

            <!-- Spacing -->
            <table><tr><td height="100px">&nbsp;</td></tr></table>

            <!-- Payment Method Table -->
            <table cellspacing="0" width="400px" border="0" align="left" style="border-collapse:collapse">
                <tr height="25px">
                    <th align="left" bgcolor="#2196f3" style="padding:0 10px; border:2px solid #2196f3">Méthode de paiement :</th>
                </tr>
                <tr height="25px">
                    <td style="border:2px solid #2196f3; padding: 0 10px">Paiement  {{$res->methode_payement}}</td>
                </tr>
            </table>
            <!-- Spacing -->
            <table><tr><td height="150px">&nbsp;</td></tr></table>

            <!-- Footer -->
            <hr bgcolor="#2196f3" style="border:1px solid #2196f3">

            <!-- Spacing -->
            <table><tr><td height="10px">&nbsp;</td></tr></table>
           
         <center>   <div class="footer-line">
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
                </center>
    </div>

        </div>
        @endforeach
    </body>
</html>
