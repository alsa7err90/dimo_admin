<?php

namespace Modules\Category\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Category\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $service)
    {
    }
    public function index()
    {
        $pageTitle = __('Categories Page');
        $categories = $this->service->get();
        return $this->jsonSuccess([
            'pageTitle'=>$pageTitle,
            'categories'=>$categories
        ]);
    }


    public function store(Request $request)
    {
        $data =  $this->service->store($request);
        return $this->ReturnApi($data);
    }

    public function show($id)
    {
        return view('category::show');
    }

    public function edit($id)
    {
        return view('category::edit');
    }

    public function update(Request $request, $id)
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
