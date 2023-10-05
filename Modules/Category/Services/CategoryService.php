<?php

namespace Modules\Category\Services;

use Illuminate\Support\Facades\Cache;
use Modules\Category\Entities\Category;

class CategoryService
{
    public function __construct()
    {
        //
    }

    public function get()
    {
        return Category::with('children')->where('parent_id', 0)->simplePaginate(getPaginate());
    }

    public function getRowsTable($data)
    {
        $output = "";
        if ($data->count() > 0) {
           return  view('category::components.ul', [
                'categories' => $data

            ]);
        } else {
            $output = "not found !";
        }

        return $output;
    }


    public function store($request)
    {
        if ($request->parent_id == 0)
            $request->request->remove('parent_id');
        $category = Category::create($request->all());
        if ($category) {
            Cache::forget('Category');
            return ['success', __('You have successfully created a Category!'), $category];
        } else {
            return ['error', __('Failed Store'), null];
        }
    }

    public function update($request, $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->update($request->all());
            return ['success', __('You have successfully updated a Category!')];
        } else {
            return ['error', __('Not Found')];
        }
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return ['error', __('Not Found')];
        }
        if ($category->children) {
            foreach ($category->children()->with('posts')->get() as $child) {
                foreach ($category->children()->get() as $child) {
                    foreach ($child->posts as $post) {
                        $post->update(['category_id' => NULL]);
                    }
                }
                $category->children()->delete();
            }
        }
        if (isset($category->posts)) {
            foreach ($category->posts as $post) {
                $post->update(['category_id' => NULL]);
            }
        }
        if ($category->delete()) {
            return ['success', __('You have successfully deleted a Category!')];
        }
        return ['error', __('Failed Delete')];

    }
}
