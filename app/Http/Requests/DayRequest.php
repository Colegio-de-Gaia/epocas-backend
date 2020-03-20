<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Epoch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'epoch_id' => 'required',
            'date' => 'required|date|unique:days',
            'sentence' => 'required|min:8',
            'sentence_author' => 'required|min:3|max:70',
            'pray' => 'required|min:3',
            'photo_path' => 'required',
            'photo_author' => 'required|min:8|max:70',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
}
