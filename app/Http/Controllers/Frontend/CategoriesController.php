<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    protected $postRepository;
    protected $categoryRepository;

    public function __construct(PostRepositoryInterface $postRepository,CategoryRepositoryInterface $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategoryPosts($category_id)
    {
        $category = $this->categoryRepository->findOneOrFail($category_id ,[ 'name'] );
        $posts = $this->postRepository->findBy(['category_id' =>$category_id ] , 5,['id' , 'title' , 'description','created_at'] );

        return view('frontend.category', compact('category','posts'));
    }

}
