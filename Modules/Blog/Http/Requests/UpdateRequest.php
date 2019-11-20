<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $blog = $this->route('blog');
        return [
            'title' => 'required|string|max:191',
            'slug' => 'sometimes|max:191|unique:blogs,slug,'.$blog->id,
            'description' => 'required',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'author' => 'sometimes|string|max:191',
            'status' => 'required',
            'tab_title' => 'sometimes|string|max:191'
        ];
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
