<?php namespace Valgomat;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model {

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

	public function parties () {
        return $this->belongsToMany('Valgomat\Party');
    }

    public function category () {
        return $this->belongsTo('Valgomat\Category');
    }

}
