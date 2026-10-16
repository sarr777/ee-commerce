<?php
declare(strict_types=1);

namespace App\Http\Requests\Produit;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'libelle' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string', 'max:65535'],
            'image' => ['sometimes', 'string', 'max:255'],
            'prix' => ['sometimes', 'integer'],
            'categorie_id' => ['sometimes', 'integer', 'exists:categories,id'],
        ];
    }
}
