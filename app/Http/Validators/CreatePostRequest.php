<?php

namespace App\Http\Validators;

class CreatePostRequest extends ApiFormRequest
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
            'name' => ['required', 'string'],
            'link' => ['required', 'string'],
            'amount_upvotes' => ['required', 'integer'],
            'author_name' => ['required', 'string'],
        ];
    }

    public function messages()
    {

    }
}
