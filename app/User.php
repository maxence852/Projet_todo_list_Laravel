<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //orsqu'on crée un enregistrement avec  la méthode create comme on l'a prévu ci-dessus il y a un risque au niveau de la sécurité.
    // Dans le tableau transmis en paramètre on a normalement seulement les champs que l'on désire renseigner.
    // Mais si un petit malin envoie d'autres informations elles risquent fort de se propager jusqu'à la table.
    // Pour éviter cela on définit dans le modèle les champs qui peuvent être mis à jour avec cette méthode
    // (on parle de mise à jour de masse) dans la propriété $fillable
    protected $fillable = ['name', 'prenom','pseudo','email', 'password','tel','pays','date','genre','numpostal','nomville','nomrue','numerorue'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
