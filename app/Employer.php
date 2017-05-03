<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = ['name', 'user_id', 'description'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function deals()
    {
    	return $this->belongsToMany(Deal::class);
    }

}
