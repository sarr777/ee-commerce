<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'services';

    protected $fillable = [
        'libelle',
        'description',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'libelle' => 'string',
            'description' => 'string',
            'image' => 'string',
        ];
    }
}
