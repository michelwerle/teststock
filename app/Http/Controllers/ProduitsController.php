<?php

namespace App\Http\Controllers;

use App\Produit;

class ProduitsController extends Controller
{
    public function index()
    {
        return view('admin.produits.index');
    }

}
