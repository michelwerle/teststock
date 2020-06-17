<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'description', 'prix', 'quantite' ];
    protected $dateFormat = 'Y-m-d H:i:s';
}
