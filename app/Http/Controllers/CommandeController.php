<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\CommandeRepository;
use App\Http\Requests\Commande\StoreCommandeRequest;
use App\Http\Requests\Commande\UpdateCommandeRequest;
use App\Http\Resources\CommandeResource;
use App\Http\Resources\CommandeCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function __construct(private readonly CommandeRepository $repository) {}

    public function index(Request $request): JsonResponse
    {
        $perPage = (int) ($request->integer('per_page') ?: 15);
        return response()->json(new CommandeCollection($this->repository->paginate($perPage)));
    }

    public function store(StoreCommandeRequest $request): JsonResponse
    {
        $item = $this->repository->create($request->validated());
        return response()->json(new CommandeResource($item), 201);
    }

    public function show(int|string $commande): JsonResponse
    {
        return response()->json(new CommandeResource($this->repository->find($commande)));
    }

    public function update(UpdateCommandeRequest $request, int|string $commande): JsonResponse
    {
        $item = $this->repository->update($commande, $request->validated());
        return response()->json(new CommandeResource($item));
    }

    public function destroy(int|string $commande): JsonResponse
    {
        $this->repository->delete($commande);
        return response()->json(null, 204);
    }
}
