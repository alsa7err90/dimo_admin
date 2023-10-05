<?php

namespace Modules\question\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return $this->jsonSuccess([
            'pageTitle'=>$pageTitle,
            'data'=>$data
        ]);
    }


    public function store(questionRequest $request)
    {
        $data =  $this->service->store($request);
        return $this->ReturnApi($data);
    }


    public function update(questionRequest $request, $id)
    {
        $data =  $this->service->update($request, $id);
        return $this->ReturnApi($data);
    }

    public function destroy($id)
    {
        $data = $this->service->destroy($id);
        return $this->ReturnApi($data);

    }
}
