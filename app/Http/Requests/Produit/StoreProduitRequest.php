<?php
declare(strict_types=1);

namespace App\Http\Requests\Produit;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'libelle' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:65535'],
            'image' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'integer'],
            'categorie_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
}
