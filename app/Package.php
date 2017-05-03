<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    
    protected $fillable = ['name', 'description', 'price'];

	public function getFormattedPriceAttribute()
	{
		return str_replace(',', '', number_format($this->price / 100, 2));
	}

}
