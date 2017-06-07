<?php

namespace moulikCTF;

use Illuminate\Database\Eloquent\Model;
class forum_post extends Model
{
	public function user(){
		return $this->belongsTo('moulikCTF\User');
	}    
	public function comment()
    {
        return $this->hasMany('moulikCTF\comment');
    }
}