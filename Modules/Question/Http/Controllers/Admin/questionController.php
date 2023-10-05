<?php

namespace Modules\question\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\question\Http\Requests\questionRequest;
use Modules\question\Services\questionService;

class questionController extends Controller
{
    public function __construct(private questionService $service)
    {
    }
    public function index(Request $request)
    {
        $pageTitle = __('question Page');
        $data = $this->service->get();
        $rows =$this->service->getRowsTable($data) ;
        return view('question::admin.index', compact('data', 'pageTitle','rows'));

    }
    public function store(questionRequest $request)
    {
        return  $this->service->store($request);
    }

    public function update(questionRequest $request, $id)
    {
        $update =  $this->service->update($request, $id);
        // if($request->ajax()){
        //     $data = view('question::components.tbody', ['data' => $this->service->get() ]);
        //  }
        return  $update ;
    }
    public function destroy($id)
    {
       return $this->service->destroy($id);
    }
}
