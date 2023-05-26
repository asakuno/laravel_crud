<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->is('shops/*') && $this->isMethod('post')) {
            return true;
        } elseif ($this->is('shops/*') && $this->isMethod('put')) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:20',
            'address' => 'required|max:50',
            'description' => 'max:140',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ];
    }
}
