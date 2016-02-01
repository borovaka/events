<?php namespace Modules\Ticketsadmin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest {

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

		$action = $this->method();
		if($action == 'PATCH') {
			return [
				'name' => 'required|string',
				'email' => 'required|email',
				'password' => 'string|min:6',
				'type' => 'required|integer'
			];
		} else {
			return [
				'name' => 'required|string',
				'email' => 'required|email|unique:users',
				'password' => 'required|string|min:6',
				'type' => 'required|integer'
			];
		}

	}

}
