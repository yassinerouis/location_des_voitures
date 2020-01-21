<!DOCTYPE html>
<html>
<body>

<h3>Bonjour {{$name}},</h3>
<p>Veuillez consulter votre compte RajiCars pour voir votre facture de reservation de la voiture {{$car}} chez nous</p>
<p>Cordialement,<p>
<p>FACTURE : Cliquez <a href="{{url('facture/'.$id)}}"> ici</a></p>
</body>
</html>