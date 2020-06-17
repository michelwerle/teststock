<?php

namespace App\Http\Controllers\Api\V1;

use App\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function update(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->update($request->all());

        return $produit;
    }

    public function store(Request $request)
    {
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
