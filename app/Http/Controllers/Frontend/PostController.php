<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    protected $repository;
    protected $categoryRepository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = $this->repository->findWithJoin(
            $post_id , ['posts.id' , 'posts.title' , 'posts.description' ,'posts.created_at' , 'categories.name']
        );

        return view('frontend.post', compact('post'));
    }

}
