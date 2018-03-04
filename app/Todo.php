<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['desc', 'user_id'];

    public function status() {
        return $this->status ? 'Done' : 'Undone';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
