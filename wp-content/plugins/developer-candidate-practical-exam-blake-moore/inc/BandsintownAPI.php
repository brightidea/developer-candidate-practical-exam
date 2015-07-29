<?php

class BandsintownAPI {
	// url to BandsinTown api
	var $apiUrl = 'http://api.bandsintown.com/';
	
	// Bandsintown Artist Name from shortcode attribute
	var $artist; 

	public function __construct($artist)
	{
		$this->name = $artist;
	}
	public function getArtistShows($artist)
	{

		$json = wp_remote_get($this->apiUrl . 'artists/' . $artist . '/events.json?api_version=2.0&app_id=developer-candidate-practical-exam');
		
		$array = json_decode($json['body']);
		
		$shows = $array;
		
		return $shows;
	}
}