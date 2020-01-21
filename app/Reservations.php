<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservations extends Model
{
    /*j'ai utilise soft delete pour les reservations pour ajouter un champ à la base de donnee 
    ou cas ou l'utilisateur appuie sur supprimer par faute la reservation va s'ajouter à la corbeille 
    et il peux contacter l'administrateur de l'application pour la restaurer*/
    
    use SoftDeletes;
    protected $dates=['deleted_at'];
}

