<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LibrarySaveRequest extends Request
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
            'id'   => 'required|integer|min:1',
            'code' => 'required|regex:/^[A-Z]{3}[0-9]{3}$/',
            'name' => 'required|string',
            'abbr' => 'required|string',
            'url'  => 'required|url'
        ];
    }
}
