<?php

namespace App\Http\Controllers\Api;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Category\Entities\Category;
use Modules\Language\Entities\Language;
use Modules\Question\Entities\question;
use Modules\Review\Entities\Review;
use Modules\Setting\Entities\Setting;
use Modules\Tag\Entities\Tag;

class HomeController extends Controller
{
     public function baseData(){
        try {
            // Cache::forget('Setting_array');
            $data['Setting'] = Cache::remember('Setting_array', Status::CACHE, function () {
                return Setting::select('key', 'value','desc')->get() ;
            });
        } catch (\Throwable $th) {
            //throw $th;
        }

        try {
            $data['Category'] = Cache::remember('Category_array', Status::CACHE, function () {
                return Category::select('id', 'name')->get()->pluck('name', 'id');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }


        try {
            $data['Tag'] = Cache::remember('Tag_array', Status::CACHE, function () {
                return Tag::select('id', 'name')->get()->pluck('name', 'id');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }


        try {
            $data['Language'] = Cache::remember('Language_array', Status::CACHE, function () {
                return Language::select('id', 'code','name','flug','status','is_default')->get();
            });
        } catch (\Throwable $th) {
            //throw $th;
        }


        try {
            $data['question'] = Cache::remember('question_array', Status::CACHE, function () {
                return question::get();
            });
        } catch (\Throwable $th) {
            //throw $th;
        }


        try {
            $data['Review'] = Cache::remember('Review_array', Status::CACHE, function () {
                return Review::get();
            });
        } catch (\Throwable $th) {
            //throw $th;
        }


        return $this->jsonSuccess($data);
     }
}
