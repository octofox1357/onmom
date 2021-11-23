<?php
namespace Project\Entity;

class User {
	public $id;
	public $email;
	public $password;
	public $name;
    public $phone;
    public $address;
    public $level;

    private $boardTable;

    public function __construct($boardTable) {
        $this->boardTable = $boardTable;
    }

    public function writePost($post) {
        $post['user_id'] = $this->id;
        if($post['id'] == null){
            $post['reg_time'] = time();
        }
		return $this->boardTable->save($post);
	}
    
}