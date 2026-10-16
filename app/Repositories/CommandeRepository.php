<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Commande;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CommandeRepository
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Commande::query()->latest('id')->paginate($perPage);
    }

    /** @return Collection<int, Commande> */
    public function all(): Collection
    {
        return Commande::query()->latest('id')->get();
    }

    public function find(int|string $id): Commande
    {
        return Commande::query()->findOrFail($id);
    }

    public function create(array $data): Commande
    {
        return Commande::query()->create($data);
    }

    public function update(int|string $id, array $data): Commande
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
