<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;

class Select2SearchController extends Controller
{
    public function selectSearchClient(Request $request)
    {
    	$clients = [];

        if($request->has('q')){
            $search  = $request->q;
            $clients = Client::select("id", "nom_complet")
            		->where('nom_complet', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($clients);
    }

    public function selectSearchProduit(Request $request)
    {
    	$produits = [];
        if($request->has('q')){
            $search  = $request->q;
            $produits = Produit::select("id", "ref", "libelle","price")
            		->where('ref', 'LIKE', "%$search%")
                    ->orWhere('libelle', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($produits);
    }
}
