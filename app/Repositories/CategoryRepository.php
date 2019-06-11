<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    use BaseRepository;

    /**
     * The validation instance.
     *
     * @var \App\Models\Category
     */
    protected $model;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model) {
        $this->model = $model;
    }

}
