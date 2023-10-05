<?php

namespace Modules\Post\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Post\Entities\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::simplePaginate(getPaginate());
        return $this->jsonSuccess($posts);
    }
    public function show($id)
    {

        $posts = Post::find($id);
        return $this->jsonSuccess($posts);
    }

}
