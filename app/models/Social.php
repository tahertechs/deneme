<?php

class Social extends Eloquent{

	protected $table = 'socials';

    public function user()
    {
        return $this->belongsTo('User');
    }

}