<?php

class University extends Eloquent{

	protected $table = 'universities';

	protected $fillable = array('name','address');

}