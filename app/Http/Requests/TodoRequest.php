<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'task' => 'required|max:50',
            'thumbnail' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     *  Custom message for validation
     * 
     * @return array
     */
    public function messages() 
    {
        return [
            'task.required' => __('Task is required!'),
            'task.max:50' => __('Task must be max 50 characters long!'),
            'thumbnail.image' => __('File must be an image!'),
        ];
    }
}