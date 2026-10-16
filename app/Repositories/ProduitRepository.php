<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Produit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProduitRepository
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Produit::query()->latest('id')->paginate($perPage);
    }

    /** @return Collection<int, Produit> */
    public function all(): Collection
    {
        return Produit::query()->latest('id')->get();
    }

    public function find(int|string $id): Produit
    {
        return Produit::query()->findOrFail($id);
    }

    public function create(array $data): Produit
    {
        return Produit::query()->create($data);
    }

    public function update(int|string $id, array $data): Produit
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
