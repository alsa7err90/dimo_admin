<?php

namespace Modules\Category\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $service)
    {
    }
    public function index(Request $request)
    {
        $pageTitle = __('Categories Page');
        $categories = $this->service->get();
        $rows =$this->service->getRowsTable($categories) ;

        return view('category::admin.index', compact('categories','rows', 'pageTitle'));
    }

    public function store(CategoryRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(CategoryRequest $request, $id)
    {
        return  $this->service->update($request, $id);
    }
    public function destroy($id)
    {
       return $this->service->destroy($id);
    }
}
