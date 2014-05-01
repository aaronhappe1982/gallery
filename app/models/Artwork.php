<?php

class Artwork extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'gallery_id' => 'required',
		'name' => 'required',
		'description' => 'required',
		'image' => 'required'
	);

	public function gallery()
  {
		return $this->belongsTo('Gallery');
  }

}
