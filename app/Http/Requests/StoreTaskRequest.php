<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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


    //   @return array<string, mixed>

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'is_completed' => "boolean"
        ];
    }
}
