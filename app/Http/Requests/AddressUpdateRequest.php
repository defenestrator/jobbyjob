<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
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
            'team_id' => ['integer', 'exists:teams,id'],
            'user_id' => ['integer', 'exists:users,id'],
            'location' => ['string'],
            'address_1' => ['required', 'string'],
            'address_2' => ['string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'postcode' => ['required', 'string'],
        ];
    }
}
