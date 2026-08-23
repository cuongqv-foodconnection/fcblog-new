<?php

namespace App\Features\Post\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Features\Post\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function search(Request $request): LengthAwarePaginator
    {
        $keyword = $request->input('q', '');
        $perPage = (int) $request->input('per_page', 15);

        return $this->model
            ->where('title', 'like', '%' . $keyword . '%')
            ->latest()
            ->paginate($perPage);
    }
}
