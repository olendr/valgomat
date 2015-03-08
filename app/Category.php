<?php namespace Valgomat;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function opinions () {
        return $this->hasMany('Valgomat\Opinion');
    }

}
