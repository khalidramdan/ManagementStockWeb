<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit produit</title>
</head>

<body>
    <form action="{{ route('produit.update', ['produit' => $produit->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="produit_ref">REF</label>
        <input type="text" id="produit_ref" name="produit_ref" value="{{ $produit->ref }}"><br>
        <label for="produit_libelle">Libelle</label>
        <input type="text" id="produit_libelle" name="produit_libelle" value="{{ $produit->libelle }}"><br>
        <label for="produit_qte">Quantité</label>
        <input type="text" id="produit_qte" name="produit_qte" value="{{ $produit->qte }}"><br>
        <label for="produit_price">Prix</label>
        <input type="text" id="produit_price" name="produit_price" value="{{ $produit->price }}"><br>
        <label for="bon_commande">Bon de commande - Fournisseur</label> <!--todo-->
        <select name="bon_commande" id="bon_commande">
            @foreach ($bon_commandes as $bon_commande)
                <option value="{{$bon_commande->id}}">{{$bon_commande->id_bc}} - {{$bon_commande->fournisseur}}</option>
            @endforeach
        </select>
        <input type="submit" name="" id="" value="modifier">
    </form>
    <br><br><br>
    <div>
        <form action="{{ route('produit.destroy', ['produit' => $produit->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" name="" id="" value="supprimer">
        </form>
        <a href="{{ route('produit.index') }}">afficher les produits</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->exists('status'))
        {{ session('status', '') }}
    @endif
</body>

</html>