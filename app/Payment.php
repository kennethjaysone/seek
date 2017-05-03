<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['package_id', 'user_id', 'amount', 'listing_count'];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'id');
    }

    public function package()
    {
    	return $this->belongsTo(Package::class);
    }

}
