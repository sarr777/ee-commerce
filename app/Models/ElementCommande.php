<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElementCommande extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'element_commandes';

    protected $fillable = [
        'prix',
        'quantite',
        'produit_id',
        'commande_id',
    ];

    protected function casts(): array
    {
        return [
            'prix' => 'integer',
            'quantite' => 'integer',
            'produit_id' => 'integer',
            'commande_id' => 'integer',
        ];
    }

    public function produit(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Produit::class, 'produit_id', 'id');
    }

    public function commande(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Commande::class, 'commande_id', 'id');
    }
}
