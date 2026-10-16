<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private readonly PostRepository $repository) {}

    public function index(Request $request): JsonResponse
    {
        $perPage = (int) ($request->integer('per_page') ?: 15);
        return response()->json(new PostCollection($this->repository->paginate($perPage)));
    }

    public function store(StorePostRequest $request): JsonResponse
    {
        $item = $this->repository->create($request->validated());
        return response()->json(new PostResource($item), 201);
    }

    public function show(int|string $post): JsonResponse
    {
        return response()->json(new PostResource($this->repository->find($post)));
    }

    public function update(UpdatePostRequest $request, int|string $post): JsonResponse
    {
        $item = $this->repository->update($post, $request->validated());
        return response()->json(new PostResource($item));
    }

    public function destroy(int|string $post): JsonResponse
    {
        $this->repository->delete($post);
        return response()->json(null, 204);
    }
}
