<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\ElementCommande;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ElementCommandeRepository
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return ElementCommande::query()->latest('id')->paginate($perPage);
    }

    /** @return Collection<int, ElementCommande> */
    public function all(): Collection
    {
        return ElementCommande::query()->latest('id')->get();
    }

    public function find(int|string $id): ElementCommande
    {
        return ElementCommande::query()->findOrFail($id);
    }

    public function create(array $data): ElementCommande
    {
        return ElementCommande::query()->create($data);
    }

    public function update(int|string $id, array $data): ElementCommande
    {
        $item = $this->find($id);
        $item->update($data);
        return $item;
    }

    public function delete(int|string $id): void
    {
        $item = $this->find($id);
        $item->delete();
    }
}
