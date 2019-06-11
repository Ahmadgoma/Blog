<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CategoriesController extends Controller
{

    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repository->paginate(5 , ['id' , 'name' , 'created_at']);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required|max:255',
        ]);

        $categoryCreated =  $this->repository->create([
            'name' => $request->name
        ]);

        if($categoryCreated){
            return redirect()->route('categories.index')->with('success', 'Category has been created Successfully');
        }
        return redirect()->route('categories.index')->with('error', 'Error in creating category.');

    }

    /**
     * @param $category_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($category_id)
    {
        $category = $this->repository->findOneOrFail($category_id , ['id','name']);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * @param Request $request
     * @param $category_id
     * @return $this
     */
    public function update(Request $request, $category_id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $isUpdated = $this->repository->update($category_id ,
            [ 'name' => $request->name ]
            );

        if($isUpdated){
            return redirect()->route('categories.index')->with('success', 'Category has been updated Successfully');
        }
        return redirect()->route('categories.index')->with('error', 'Error in updating category.');

    }

    /** Remove the specified resource from storage.
     * @param $id
     * @return $this
     */
    public function destroy($id)
    {
        $categoryDeleted = $this->repository->delete($id);

        if($categoryDeleted){
            return redirect()->route('categories.index')->with('success', 'Category has been deleted Successfully');
        }
        return redirect()->route('categories.index')->with('error', 'Error in deleting category.');
    }
}
