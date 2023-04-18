<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class PaginationAPIRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string,  \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'page'=>[
                'min:1',
                'integer'
            ],
            'per_page'=>[
                'min:1',
                'max:9999',
                'integer'
            ],
            'all'=>[
                'nullable'
            ],
        ];
    }

    /**
     * @param Validator $validator
     * @return mixed
     * @throws HttpResponseException
     */
    public function HttpResponseException(Validator $validator):HttpResponseException{
        throw new HttpResponseException(
            response()->json([
                'success'=>false,
                'message'=>'Validation Errors',
                'data'=>$validator->errors(),
            ])
        );
    }

    public function messages(): array
    {
        return [
            'page' => 'Page must be an integer greater or equal to 1',
            'per_page' => 'Per Page must be an integer between 1 and 9999',
            'all' => 'Must be true or false (1 or 0)'
        ];
    }
}
