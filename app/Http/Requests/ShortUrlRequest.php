<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortUrlRequest extends FormRequest
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
            'original_url' => 'required|url'
        ];
    }
    public function messages()
    {
        return [
            'original_url.required' => 'Điền link cần rút gọn',
            'original_url.url' => 'Link không đúng định dạng'
        ];
    }
}
