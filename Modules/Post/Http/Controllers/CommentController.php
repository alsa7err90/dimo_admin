<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'body'=>'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }
}
