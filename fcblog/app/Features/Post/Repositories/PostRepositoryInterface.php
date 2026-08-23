<?php

namespace App\Features\Post\Repositories;

use App\Base\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface PostRepositoryInterface extends BaseRepositoryInterface
{
    public function search(Request $request): LengthAwarePaginator;
}
