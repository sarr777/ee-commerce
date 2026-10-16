<?php
declare(strict_types=1);

namespace App\Http\Requests\ElementCommande;

use Illuminate\Foundation\Http\FormRequest;

class UpdateElementCommandeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'prix' => ['sometimes', 'integer'],
            'quantite' => ['sometimes', 'integer'],
            'produit_id' => ['sometimes', 'integer', 'exists:produits,id'],
            'commande_id' => ['sometimes', 'integer', 'exists:commandes,id'],
        ];
    }
}
