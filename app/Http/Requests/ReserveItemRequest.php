<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveItemRequest extends FormRequest
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

      $item = $this->route('item');

        return [
            'start_date' => 'required|after_or_equal:' . date('Y-m-d'),
            'end_date' => 'required|after_or_equal:' . date('Y-m-d'),
            'amount' => 'required|between:1,'.$item->amount,
        ];
    }
}
