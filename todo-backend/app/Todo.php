<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    const ARRAY = ['LOW', 'MEDIUM', 'HIGH'];

    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'done' => 'boolean'
    ];

    protected $with = ['user'];
}
