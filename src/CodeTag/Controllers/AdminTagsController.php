<?php

namespace CodePress\CodeTag\Controllers;

use CodePress\CodeTag\Models\Tag;
use CodePress\CodeTag\Repository\TagRepository;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    /**
     * @var TagRepository
     */
    private $repository;

    /**
     * @var ResponseFactory
     */
    private $response;

    public function __construct(ResponseFactory $response, TagRepository $repository)
    {
        $this->repository = $repository;
        $this->response = $response;
    }

    public function index()
    {
        $tags = $this->repository->paginate(5);
        return $this->response->view('codetag::index', compact('tags'));
    }

    public function create()
    {
        $tag        = new Tag();
        $title      = 'Create Tag';
        return $this->response->view('codetag::form', compact('title', 'tag'));
    }

    public function store(Request $request)
    {
        if (is_numeric($request->get('id'))){
            $this->repository->update($request->all(), $request->get('id'));
        } else {
            $this->repository->create($request->all());
        }

        return redirect()->route('admin.tags.index');
    }

    public function edit($id) {
        $tag   = $this->repository->find($id);
        $title      = 'Edit Tag';
        return view('codetag::form', compact('tag', 'title'));
    }

    public function destroy($id) {
        $this->repository->delete($id);
        return redirect()->route('admin.tags.index');
    }
}