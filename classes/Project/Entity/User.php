<?php
namespace Project\Entity;

class User {
	public $user_id;
	public $login_id;
	public $password;
	public $temp_password;
	public $name;
    public $email;
    public $phone;
    public $ing;
    public $reg_time;
    public $log_time;
    public $log_ip;
    public $level;
    public $oauth_key;
    public $oauth_kakao;
    public $oauth_naver;
    public $temp_oauth;
    public $profile_img;
    public $group_no;
    public $cafe24_id;

    private $boardTable;
	private $commentTable;
	private $likeTable;

    public function __construct() {}
    
}