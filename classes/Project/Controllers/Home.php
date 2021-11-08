<?php
namespace Project\Controllers;

class Home {

	public function __construct() {}
    
	public function home() {
		return ['template' => 'home.html.php'];
    }
}