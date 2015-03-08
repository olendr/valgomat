<?php namespace Valgomat;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model {

	protected $guarded = [];


    public function choices() {
        return $this->hasMany('Valgomat\Choice');
    }

}
