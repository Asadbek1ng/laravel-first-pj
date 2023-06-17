<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:10',
            'description' => 'required',
            'icon' => 'required|mimes:png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Sarvlavha to`ldirilishi shart !',
            'title.min' => 'Sarvlavha eng kamida 3 ta belgi bo`lsin',
            'description.required' => 'Ta`rif to`ldirilishi shart !',
            'icon.required' => 'Rasm kiritilsin',
            'icon.mimes' => 'Rasm turi png yoki jpg bo`lishi kerak !',
            'icon.max' => 'Rasm hajmi 2 mb dan oshmasin'
        ];
    }
}
