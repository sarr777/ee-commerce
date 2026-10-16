<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ElementCommandeRepository;
use App\Http\Requests\ElementCommande\StoreElementCommandeRequest;
use App\Http\Requests\ElementCommande\UpdateElementCommandeRequest;
use App\Http\Resources\ElementCommandeResource;
use App\Http\Resources\ElementCommandeCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ElementCommandeController extends Controller
{
    public function __construct(private readonly ElementCommandeRepository $repository) {}

    public function index(Request $request): JsonResponse
    {
        $perPage = (int) ($request->integer('per_page') ?: 15);
        return response()->json(new ElementCommandeCollection($this->repository->paginate($perPage)));
    }

    public function store(StoreElementCommandeRequest $request): JsonResponse
    {
        $item = $this->repository->create($request->validated());
        return response()->json(new ElementCommandeResource($item), 201);
    }

    public function show(int|string $elementCommande): JsonResponse
    {
        return response()->json(new ElementCommandeResource($this->repository->find($elementCommande)));
    }

    public function update(UpdateElementCommandeRequest $request, int|string $elementCommande): JsonResponse
    {
        $item = $this->repository->update($elementCommande, $request->validated());
        return response()->json(new ElementCommandeResource($item));
    }

    public function destroy(int|string $elementCommande): JsonResponse
    {
        $this->repository->delete($elementCommande);
        return response()->json(null, 204);
    }
}
