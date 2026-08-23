<?php

namespace App\Features\Post\Http\Requests;

use App\Base\Http\Requests\BaseFormRequest;

class UpdatePostRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
        ];
    }
}
