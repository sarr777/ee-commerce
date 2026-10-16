<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Category::query()->latest('id')->paginate($perPage);
    }

    /** @return Collection<int, Category> */
    public function all(): Collection
    {
        return Category::query()->latest('id')->get();
    }

    public function find(int|string $id): Category
    {
        return Category::query()->findOrFail($id);
    }

    public function create(array $data): Category
    {
        return Category::query()->create($data);
    }

    public function update(int|string $id, array $data): Category
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
