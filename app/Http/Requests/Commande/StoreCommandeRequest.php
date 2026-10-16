<?php
declare(strict_types=1);

namespace App\Http\Requests\Commande;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommandeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'code' => ['required', 'string', 'max:255'],
            'payment' => ['required', 'string', 'max:255'],
            'libelle' => ['required', 'string', 'max:255'],
            'statut' => ['required', 'string', 'max:255'],
        ];
    }
}
