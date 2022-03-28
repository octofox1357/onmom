<?php
namespace Project\Controllers;

class Home {

	public function __construct() {}
    
	public function home() {
		return ['template' => 'home.html.php'];
    }
    public function onmom() {
		return ['template' => 'onmom.html.php'];
    }
    	public function cloud() {
		return ['template' => 'cloud.html.php'];
    }
	public function cloud_youtube() {
		$curl = curl_init();
		$act=array(
				'Content-Type: application/json'
		);
		$curl_url="https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCY6zUY_bu1l2K4nYpu7kmMQ&maxResults=50&order=date&key=AIzaSyDJuM_yN0ZY3-dCKs1c37wis7yeboKgexg";
		curl_setopt_array(
			$curl, array(
				CURLOPT_URL => $curl_url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => $act
			)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		$json_data=json_decode($response);
		return [
			'template' => 'cloud_youtube.html.php',
			'variables' => [
				'hero_video' => $json_data->items[0]->id->videoId,
				'list' => $json_data->items
			],
		];
	}

	// https://www.youtube.com/channel/UCrulnn2FrZgKvfQvqvzCeGg
	
	public function edu() {
		return ['template' => 'edu_position.html.php'];
	}
	
	public function edu_youtube() {
		$curl = curl_init();
		$act=array(
				'Content-Type: application/json'
		);
		$curl_url="https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCrulnn2FrZgKvfQvqvzCeGg&maxResults=50&order=date&key=AIzaSyDJuM_yN0ZY3-dCKs1c37wis7yeboKgexg";
		curl_setopt_array(
			$curl, array(
				CURLOPT_URL => $curl_url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => $act
			)
		);
		$response = curl_exec($curl);
		curl_close($curl);
		$json_data=json_decode($response);
		return [
			'template' => 'edu_position.html.php',
			'variables' => [
				'hero_video' => $json_data->items[0]->id->videoId,
				'list' => $json_data->items
			],
		];
    }
}