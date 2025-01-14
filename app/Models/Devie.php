<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num',
    ];

    /**
     * The products that belong to the quotation (devis).
     */
    public function produits()
    {
        return $this->belongsToMany(Produit::class)
                    ->as('devie_produit')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
    /**
     * The client that own this quotation (devis).
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    /**
     * Get the invoice (facture) associated with the quotation (devis).
     */
    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}
