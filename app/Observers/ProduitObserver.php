<?php

namespace App\Observers;

use App\Produit;
use App\Mouvement;

class ProduitObserver
{
    /**
     * Handle the produit "created" event.
     *
     * @param  \App\Produit  $produit
     * @return void
     */
    public function created(Produit $produit)
    {
        //
        $this->track($produit);
    }

    /**
     * Handle the produit "updated" event.
     *
     * @param  \App\Produit  $produit
     * @return void
     */
    public function updated(Produit $produit)
    {
        //
        $this->track($produit);
    }

    /**
     * Handle the produit "deleted" event.
     *
     * @param  \App\Produit  $produit
     * @return void
     */
    public function deleted(Produit $produit)
    {
        //
    }

    /**
     * Handle the produit "restored" event.
     *
     * @param  \App\Produit  $produit
     * @return void
     */
    public function restored(Produit $produit)
    {
        //
    }

    /**
     * Handle the produit "force deleted" event.
     *
     * @param  \App\Produit  $produit
     * @return void
     */
    public function forceDeleted(Produit $produit)
    {
        //
    }

    private function track($produit){

        $olds = array();
        $news = array();
        foreach($produit->getFillable() as $attribute){
            //if($produit->getOriginal($attribute)!=$produit->{$attribute}){
                $olds[$attribute] = $produit->getOriginal($attribute);
                $news[$attribute] = $produit->$attribute;
            //}
        }
        //save
        Mouvement::create([
            'produit_id' => $produit->id,
            'old' => json_encode($olds),
            'new' => json_encode($news),
        ]);
    }
}
