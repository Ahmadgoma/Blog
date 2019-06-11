<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Post;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PostRepository implements PostRepositoryInterface
{
    use BaseRepository;

    /**
     * The validation instance.
     *
     * @var \App\Models\Post
     */
    protected $model;

    /**
     * PostRepository constructor.
     * @param Post $model
     */
    public function __construct(Post $model) {
        $this->model = $model;
    }



    public function findWithJoin(int $id , array  $columns )
    {
        return $this->model->select($columns)
            ->join('categories', function ($join){
                $join->on(
                    'categories.id',
                    '=',
                    'posts.category_id'
                );
            })
            ->find($id);
    }

}