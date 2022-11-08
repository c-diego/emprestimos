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
            'startDate' => 'required|after_or_equal:' . date('Y-m-d'),
            'daysDevolution' => 'required|between:1,' . $item->days_available,
            'amount' => 'required|between:1,'.$item->amount,
        ];
    }
}
