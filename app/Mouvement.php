<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['produit_id', 'old', 'new' ];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function produit(){
        return $this->belongsTo('App\Produit');
    }
}
