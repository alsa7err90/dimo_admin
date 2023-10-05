<?php

namespace Modules\question\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\question\Services\questionService;

class questionController extends Controller
{
    public function __construct(private questionService $service)
    {
    }
    public function index()
    {
        $pageTitle = __('question Page');
        $data = $this->service->get();
        return view('question::index', compact('data', 'pageTitle'));
    }

    public function getData()
    {
        return  $this->service->get();
    }

}
