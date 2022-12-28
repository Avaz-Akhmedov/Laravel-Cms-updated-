<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "title" => "required|max:255",
            "content" => "required",
            "image" => "mimes:jpeg,png|image|max:2000",
            "category_id" => "required|exists:categories,id",
            "tags" => "required|array",
            "tags.*" => "required|string|max:100"
        ];
    }
}
