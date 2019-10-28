<!DOCTYPE html>
<html>
<body>

<h1>Bonjour {{$name}},</h1>
<p>Veuillez consulter votre compte RajiCars pour voir votre facture de reservation de la voiture {{$car}} chez nous</p>
<p>Cordialement,<p>
<p>FACTURE : Cliquez <a href="{{url('facture/'.$id)}}"> ici</a></p>
</body>
</html>