<?php

namespace CodePress\CodeTag\Controllers;

use CodePress\CodeTag\Models\Tag;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    /**
     * @var Tag
     */
    private $tag;

    /**
     * @var ResponseFactory
     */
    private $response;

    public function __construct(ResponseFactory $response, Tag $tag)
    {
        $this->tag = $tag;
        $this->response = $response;
    }

    public function index()
    {
        $tags = $this->tag->paginate(5);
        return $this->response->view('codetag::index', compact('tags'));
    }

    public function create()
    {
        $tag   = new Tag();
        $title      = 'Create Tag';
        return $this->response->view('codetag::form', compact('tag', 'title'));
    }

    public function store(Request $request)
    {
        if (is_numeric($request->get('id'))){
            $tag  = Tag::findOrFail($request->get('id'));
            $tag->update($request->all());
        } else {
            $this->tag->create($request->all());
        }

        return redirect()->route('admin.tags.index');
    }

    public function edit($id) {
        $tag   = Tag::findOrFail($id);
        $title      = 'Edit Tag';
        return view('codetag::form', compact('tag', 'title'));
    }

    public function destroy($id) {
        Tag::find($id)->delete();
        return redirect()->route('admin.tags.index');
    }
}