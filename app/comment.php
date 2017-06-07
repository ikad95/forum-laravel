<?php

namespace moulikCTF;

use Illuminate\Database\Eloquent\Model;
class comment extends Model
{
	public function user(){
		return $this->belongsTo('moulikCTF\User');
	}

}
