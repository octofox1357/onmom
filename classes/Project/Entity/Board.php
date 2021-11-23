<?php
namespace Project\Entity;

class Board {
	public $id;
	public $subject;
	public $content;
	public $user_id;
    public $reg_time;
    
    public function __construct() {}
}