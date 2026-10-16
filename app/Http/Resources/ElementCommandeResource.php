<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ElementCommandeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'prix' => $this->prix,
            'quantite' => $this->quantite,
            'produit_id' => $this->produit_id,
            'commande_id' => $this->commande_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'produit' => $this->whenLoaded('produit'),
            'commande' => $this->whenLoaded('commande'),
        ];
    }
}
