<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ServiceRepository;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\ServiceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(private readonly ServiceRepository $repository) {}

    public function index(Request $request): JsonResponse
    {
        $perPage = (int) ($request->integer('per_page') ?: 15);
        return response()->json(new ServiceCollection($this->repository->paginate($perPage)));
    }

    public function store(StoreServiceRequest $request): JsonResponse
    {
        $item = $this->repository->create($request->validated());
        return response()->json(new ServiceResource($item), 201);
    }

    public function show(int|string $service): JsonResponse
    {
        return response()->json(new ServiceResource($this->repository->find($service)));
    }

    public function update(UpdateServiceRequest $request, int|string $service): JsonResponse
    {
        $item = $this->repository->update($service, $request->validated());
        return response()->json(new ServiceResource($item));
    }

    public function destroy(int|string $service): JsonResponse
    {
        $this->repository->delete($service);
        return response()->json(null, 204);
    }
}
