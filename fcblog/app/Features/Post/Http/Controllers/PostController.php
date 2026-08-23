<?php

namespace App\Features\Post\Http\Controllers;

use App\Base\Http\Controllers\BaseCrudController;
use App\Features\Post\Http\Requests\StorePostRequest;
use App\Features\Post\Http\Requests\UpdatePostRequest;
use App\Features\Post\Http\Resources\PostResource;
use App\Features\Post\Services\PostService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PostController extends BaseCrudController
{
    protected PostService $postService;

    public function __construct(PostService $postService)
    {
        parent::__construct($postService, PostResource::class);
        $this->postService = $postService;
    }

    /**
     * GET /api/posts
     */
    public function index(Request $request): ResourceCollection
    {
        return $this->handleIndex($request);
    }

    /**
     * POST /api/posts
     */
    public function store(StorePostRequest $request): JsonResource
    {
        return $this->handleStore($request->validated());
    }

    /**
     * GET /api/posts/{id}
     */
    public function show(int|string $id): JsonResource
    {
        return $this->handleShow($id);
    }

    /**
     * PUT /api/posts/{id}
     */
    public function update(UpdatePostRequest $request, int|string $id): JsonResource
    {
        return $this->handleUpdate($request->validated(), $id);
    }

    /**
     * DELETE /api/posts/{id}
     */
    public function destroy(int|string $id): JsonResponse
    {
        return $this->handleDestroy($id);
    }

    /**
     * GET /api/posts/search?q=keyword&per_page=15
     */
    public function search(Request $request): ResourceCollection
    {
        return PostResource::collection($this->postService->search($request));
    }
}
