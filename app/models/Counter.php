<?php

class Counter extends Eloquent{

	protected $table = 'counters';

	public $timestamps = false;

	protected $fillable = array('url','count');


	// public static function linkIsAvailable($slug){

	// 	$url = Counter::where('url','=', $slug)->first();

	// 	if(!empty($url) ){
	// 		return true;
	// 	}

	// 	return false;

	// }

	/*Its Logic to Controller is as follows*/
	
	// if(Counter::linkIsAvailable($slug)){
	// 	$count = Counter::where('url','=',$slug)->first();
	// 	$count->count = ($count->count) + 1;
	// 	$count->save();
	// }
	// else{
	// 	$count = new Counter();
	// 	$count->url = $slug;
	// 	$count->count = ($count->count) + 1;
	// 	$count->save();
	// }

}