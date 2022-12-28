<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "title" => "required|max:255",
            "category_id" => "required|exists:categories,id",
            "content" => "required",
            "image" => "required|image|mimes:jpg,jpeg,svg,png|max:2000",
            "tags" => "required|array",
            "tags.*" => "required|string|max:100"
        ];
    }
}
