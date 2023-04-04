<?php

namespace App\Http\Requests;

use App\Models\Genre;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateGenreAPIRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Authorised?
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $genreID = Genre::where('uuid',$this->genre)->get();
        return [
            'name' => [
                'sometimes',
                Rule::unique('genres')->ignore($genreID),
                'min:3',
                'max:32',
            ],
            'description' => [
                'nullable',
            ]
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
            'name.unique' => 'That genre has been added previously',
        ];
    }
}
