<?php namespace Valgomat\Http\Requests;

use Valgomat\Http\Requests\Request;

class CreateParticipantRequest extends Request {

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
			'gender' => 'string',
            'age' => 'string',
            'income' => 'string',
            'political_view' => 'string',
            'last_vote' => 'string',
            'will_vote' => 'string',
            'region' => 'string',
            'municipality' => 'string',

		];
	}

}
