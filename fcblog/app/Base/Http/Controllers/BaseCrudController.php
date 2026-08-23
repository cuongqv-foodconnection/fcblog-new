<?php

namespace App\Base\Http\Controllers;

use App\Base\Services\BaseService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class BaseCrudController extends Controller
{
    public function __construct(
        protected BaseService $service,
        protected string $resourceClass
    ) {}

    public function handleIndex(Request $request): ResourceCollection
    {
        $perPage = (int) $request->input('per_page', 15);
        $data = $this->service->paginate($perPage);
        return $this->resourceClass::collection($data);
    }

    public function handleStore(array $data): JsonResource
    {
        $data = $this->service->create($data);
        return new $this->resourceClass($data);
    }

    public function handleShow(int|string $id): JsonResource
    {
        $data = $this->service->findOrFail($id);
        return new $this->resourceClass($data);
    }

    public function handleUpdate(array $data, int|string $id): JsonResource
    {
        $data = $this->service->update($id, $data);
        return new $this->resourceClass($data);
    }

    public function handleDestroy(int|string $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(null, 204);
    }
}
