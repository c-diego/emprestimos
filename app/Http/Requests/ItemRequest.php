<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
      'title' => 'required|max:200',
      'description' => 'max:300',
      'days_available' => 'required|min:1',
      'amount' => 'required|min:1',
      'image' => 'nullable|sometimes|image|mimes:jpeg,png|image'
    ];
  }
}
