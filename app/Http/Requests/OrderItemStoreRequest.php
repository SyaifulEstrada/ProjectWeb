<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderItemStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order_id' => ['required'],
            'food_id' => ['required'],
            'quantity' => ['required'],
            'unit_price' => ['required'],
            'customer_name' => ['required'],
            'ingredients_name' => ['required'],
        ];
    }
}
