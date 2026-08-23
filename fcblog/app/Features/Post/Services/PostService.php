<?php

namespace App\Features\Post\Services;

use App\Base\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Features\Post\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostService extends BaseService
{
    protected PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->postRepository = $repository;
    }

    public function search(Request $request): LengthAwarePaginator
    {
        return $this->postRepository->search($request);
    }
}
