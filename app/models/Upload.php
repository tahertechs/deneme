<?php

class Upload extends Eloquent{

	protected $table = 'uploads';

	protected $fillable = array('url','originalname','type','size');

	public function post(){

		return $this->belongsTo('Post','post_id');
	}

}