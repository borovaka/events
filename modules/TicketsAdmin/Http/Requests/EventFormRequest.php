<?php namespace Modules\Ticketsadmin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFormRequest extends FormRequest {

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
			'event_name' => 'required',
			'event_desc' => 'required',
			'start_date' => 'required|date',
			'quantity'   => 'required|integer',
			'price'      => 'required|numeric',
			'discount'   => 'numeric'
		];
	}

}
