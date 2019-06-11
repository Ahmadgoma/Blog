<?php

namespace App\Http\Controllers\Frontend;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use BaseRepository;

    protected $categoryRepository , $postRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository ,  PostRepositoryInterface $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = $this->categoryRepository->all(['id' , 'name' , 'created_at']);

        $posts = $this->postRepository->paginate(5 , ['id' , 'title' , 'description' ,'created_at']);
        return view('frontend.index', compact('categories' , 'posts'));
    }
}
