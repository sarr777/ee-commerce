<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'commandes';

    protected $fillable = [
        'date',
        'code',
        'payment',
        'libelle',
        'statut',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'code' => 'string',
            'payment' => 'string',
            'libelle' => 'string',
            'statut' => 'string',
        ];
    }
}
