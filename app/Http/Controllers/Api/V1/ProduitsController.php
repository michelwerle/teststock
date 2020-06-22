<?php

namespace App\Http\Controllers\Api\V1;

use App\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\StockBas;


class ProduitsController extends Controller
{
    public function index()
    {
        return Produit::all();
    }

    public function show($id)
    {
        return Produit::findOrFail($id);

    }

    public function statistiques($id)
    {
        $produit = Produit::findOrFail($id);

        $colors = [
            'prix' => 'rgba(249,49,0,.9)',
            'quantite' => 'rgba(249,170,0,.95)'
        ];

        //chart
        $mouvements = array();
        foreach($produit->mouvements as $mouvement){
            //$old = json_decode($mouvement->old);
            $new = json_decode($mouvement->new);
            foreach($new as $key=>$value){
                if($key=="prix" || $key=="quantite")
                    $mouvements[$key][] = $value;
            }
        }

        $data = array(
             'labels' => $produit->mouvements->pluck('created_at')->toArray(),
             'datasets' => array()
        );

        foreach($mouvements as $label=>$values){
            $data['datasets'][] = array(
                'label' => $label,
                'data' => $values,
                'borderColor' => $colors[$label],
                'yAxisID' => $label,
                'backgroundColor' => 'rgba(255,255,255,0)'
            ) ;
        }


        return $data;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id' => 'required|exists:produits,id',
            'nom' => 'required|string',
            'description' => 'required|string',
            'quantite' => 'required|integer',
            'prix' =>  'required|numeric',
        ]);

        $produit = Produit::findOrFail($id);
        $produit->update($request->all());

        if($request->quantite < 2){
            event(new StockBas($produit));
        }

        return $produit;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|string',
            'description' => 'required|string',
            'quantite' => 'required|integer',
            'prix' =>  'required|numeric',
        ]);
        $produit = Produit::create($request->all());
        return $produit;
    }

    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        return '';
    }
}
