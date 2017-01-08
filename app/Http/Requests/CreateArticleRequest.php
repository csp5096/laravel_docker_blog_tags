<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     * e.g. User A does not have the authorize to edit User B's comments.
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
            // Title must have a minimum of 3 characters
            'title' => 'required|min:3',
            'body'  => 'required',
            'created_at' => 'required|date'
        ];
    }
}
