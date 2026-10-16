<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ProduitRepository;
use App\Http\Requests\Produit\StoreProduitRequest;
use App\Http\Requests\Produit\UpdateProduitRequest;
use App\Http\Resources\ProduitResource;
use App\Http\Resources\ProduitCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function __construct(private readonly ProduitRepository $repository) {}

    public function index(Request $request): JsonResponse
    {
        $perPage = (int) ($request->integer('per_page') ?: 15);
        return response()->json(new ProduitCollection($this->repository->paginate($perPage)));
    }

    public function store(StoreProduitRequest $request): JsonResponse
    {
        $item = $this->repository->create($request->validated());
        return response()->json(new ProduitResource($item), 201);
    }

    public function show(int|string $produit): JsonResponse
    {
        return response()->json(new ProduitResource($this->repository->find($produit)));
    }

    public function update(UpdateProduitRequest $request, int|string $produit): JsonResponse
    {
        $item = $this->repository->update($produit, $request->validated());
        return response()->json(new ProduitResource($item));
    }

    public function destroy(int|string $produit): JsonResponse
    {
        $this->repository->delete($produit);
        return response()->json(null, 204);
    }
}
