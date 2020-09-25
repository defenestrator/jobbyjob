<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeUpdateRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'active' => ['required'],
            'stack_overflow' => ['required', 'string', 'max:140'],
            'cv' => ['required', 'string'],
            'address_id' => ['required', 'integer', 'exists:addresses,id'],
            'phone' => ['required', 'integer', 'gt:0'],
            'github' => ['required', 'string', 'max:140'],
            'linked_in' => ['required', 'string', 'max:140'],
            'facebook' => ['required', 'string', 'max:140'],
            'instagram' => ['required', 'string', 'max:140'],
            'twitter' => ['required', 'string', 'max:140'],
            'snapchat' => ['required', 'string', 'max:140'],
        ];
    }
}
