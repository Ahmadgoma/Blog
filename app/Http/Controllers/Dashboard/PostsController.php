<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    protected $repository;
    protected $categoryRepository;

    public function __construct(PostRepositoryInterface $repository,CategoryRepositoryInterface $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->paginate(5 , ['id' , 'title' , 'description' ,'created_at']);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all(['id','name']);
        return view('admin.posts.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|integer',
        ]);

        $postCreated =  $this->repository->create([
            'title' => $request->title ,
            'description' => $request->description ,
            'category_id' => $request->category_id
        ]);

        if($postCreated){
            return redirect()->route('posts.index')->with('success', 'Post has been created Successfully');
        }
        return redirect()->route('posts.index')->with('error', 'Error in creating post.');

    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($post_id)
    {
        $categories = $this->categoryRepository->all(['id','name']);
        $post = $this->repository->findOneOrFail($post_id , ['id','title' , 'description' , 'category_id']);
        return view('admin.posts.edit',compact('categories' , 'post'));
    }

    /**
     * @param Request $request
     * @param $post_id
     * @return $this
     */
    public function update(Request $request,$post_id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|integer'
        ]);

        $isUpdated = $this->repository->update($post_id ,
            [
                'title' => $request->title ,
                'category_id' => $request->category_id ,
                'description' => $request->description ,
            ]
        );

        if($isUpdated){
            return redirect()->route('posts.index')->with('success', 'Post has been updated Successfully');
        }
        return redirect()->route('posts.index')->with('error', 'Error in updating post.');
    }

    /**
     * @param $id
     * @return $this
     */
    public function destroy($id)
    {
        $postDeleted = $this->repository->delete($id);

        if($postDeleted){
            return redirect()->route('posts.index')->with('success', 'Post has been deleted Successfully');
        }
        return redirect()->route('posts.index')->with('error', 'Error in deleting post.');
    }
}
