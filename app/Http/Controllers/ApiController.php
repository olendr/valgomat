<?php namespace Valgomat\Http\Controllers;

use \Cache;
use \Input;
use \Queue;
use Valgomat\Choice;
use Valgomat\Http\Requests\CreateParticipantRequest;

use Valgomat\Http\Requests;

use Valgomat\Opinion;
use Valgomat\Participant;

class ApiController extends Controller {

    /*
     * Returns data to build
     * personalia form
     */
	public function personalia()
    {
        $personalia = config('personalia');

        return [
            'success' => true,
            'personalia' => $personalia
        ];
    }

    public function opinions()
    {
        if (Cache::has('opinions')) {
           return Cache::get('opinions');
        }

        $opinions = Opinion::with(['category', 'parties'])
            ->where('category_id', '!=', 0)
            ->orderBy('category_id')
            ->get()
            ->toArray();

        Cache::put('opinions', $opinions, 30);

        return $opinions;
    }

    public function parties()
    {
        return config('personalia')['last_vote']['options'];
    }

    public function store(CreateParticipantRequest $request)
    {
        $participant = $request->except('opinions');
        $choices = $request->only('opinions');

        Queue::push('\Valgomat\Services\Participant', [
            'participant' => $participant,
            'opinions' => $choices
        ]);

        return [
            'success' => true
        ];
    }

    public function sort()
    {
        $input = Input::all();

        return $input;
    }

}
