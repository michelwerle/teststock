<?php

namespace App\Http\Controllers;

class ProduitsController extends Controller
{
    public function index()
    {
        return view('admin.produits.index');
    }

}
