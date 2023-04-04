<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreGenreAPIRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // We can use this to verify the user is logged in and authorised to do the action.
        // This example, for now will just say - ok, let's do this!
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:32',
                'unique:App\Models\Genre,name',
            ],
            'description' => [
                'nullable',
            ],
            'uuid' => [
                'nullable',
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'success' => false,
                    'message' => 'Validation errors',
                    'data' => $validator->errors(),
                ])
        );
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The Genre name is required',
            'name.min' => 'The Genre name must be at least 3 characters long',
            'name.max' => 'The Genre name must be shorter than 32 characters',
            'name.unique'=> 'That genre has been added previously',
        ];
    }
}
