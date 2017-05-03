<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{

	protected $fillable = ['deal_type_id', 'package_id', 'name', 'description', 'min', 'max', 'price'];

    public function type()
    {
    	return $this->belongsTo(DealType::class, 'deal_type_id');
    }

    public function employers()
    {
    	return $this->belongsToMany(Employer::class);
    }

	public function getFormattedPriceAttribute()
	{
		return str_replace(',', '', number_format($this->price / 100, 2));
	}

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

}
