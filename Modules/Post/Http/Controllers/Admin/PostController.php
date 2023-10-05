<?php

namespace Modules\Post\Http\Controllers\Admin;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Post\Entities\Post;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pageTitle = __('Posts Page');
        $posts = Post::simplePaginate(getPaginate());
        return view('post::admin.index', compact('posts','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $pageTitle = __('Posts Page');
        return view('post::admin.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required' ,
        ]);

       if($request->hasFile('image')){
        $media_main = uploadOneFile($request->file('image'));
       }
         if(isset($request->id)){
            $post = Post::findOrFail($request->id);
            $notify = ['success', __('Success Update')];
        }
        else{
            $post = new Post() ; ;
            $notify = ['success', __('Success Store')];
        }
        $post->title = $request->title;
        $post->slug = Str::slug($request->title) ;
        $post->category_id = $request->category_id;
        if($request->publishe == Status::PUBLISHED)
        $post->published_at = Carbon::now()->format('Y-m-d H:m');
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->main_image =$media_main->name ??  $post->main_image;
         $post->save();
         return back()->withNotify($notify);

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('post::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post::admin.create',compact('post'));
    }

    public function destroy($id)
    {
        $category = Post::find($id);
        if($category->delete())
            return ['success', __('You have successfully deleted a Category!')] ;
        return ['error', __('Not Found')] ;

    }
}
