<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostEditCounselorRequest extends Request
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
    $user_id = Request::input('user_id');
    return [
      'name' => 'required',
      'email' => 'required|email|unique:users,email,'.$user_id,
      'contact_no' => 'required',
      'address' => 'required',
      'notes' => 'required'
    ];
  }
}
