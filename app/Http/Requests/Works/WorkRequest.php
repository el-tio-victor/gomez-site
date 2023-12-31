<?php

namespace App\Http\Requests\Works;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'title'    => 'required|min:3',
            //'services' => 'required|min:3',
            'detail'   => 'required|min:10',
            'img'    => 'required'
        ];
    }
}
