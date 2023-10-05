<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|min:3|max:255|string',
            'parent_id' => 'sometimes|nullable|numeric',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['slug' => 'required|string|unique:categories'];
        }else{
            $rules += ['slug' => 'required','string',
            Rule::unique('categories')->ignore($this->id)];
        }

        // if ($this->getMethod() == 'PUT') {
        //     $rules += ['email' =>  [
        //     'required',
        //     Rule::unique('users')->ignore($this->route('id')),
        // ]];
        // }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
