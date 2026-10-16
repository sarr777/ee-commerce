<?php
declare(strict_types=1);

namespace App\Http\Requests\ElementCommande;

use Illuminate\Foundation\Http\FormRequest;

class StoreElementCommandeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'prix' => ['required', 'integer'],
            'quantite' => ['required', 'integer'],
            'produit_id' => ['required', 'integer', 'exists:produits,id'],
            'commande_id' => ['required', 'integer', 'exists:commandes,id'],
        ];
    }
}
