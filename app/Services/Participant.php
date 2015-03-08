<?php


namespace Valgomat\Services;


use Valgomat\Choice;

class Participant {

    private $participant;
    private $opinion;

    public function fire($job, $data) {

        if($job->attempts() < 3) {
            $this->create($data['participant'], $data['opinions']);
        }

        $job->delete();
    }

    public function create($participant, $opinions)
    {
        $participant = \Valgomat\Participant::create($participant);

        foreach ($opinions['opinions'] as $index => $opinion) {

            if(!empty($opinion) && is_numeric($opinion)) {
                Choice::create(
                    [
                        'opinion_id' => $index,
                        'participant_id' => $participant->id,
                        'value' => $opinion
                    ]
                );
            }
        }
    }

}