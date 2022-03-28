<?php
namespace Project\Entity;

class BoardMetadata {
	public $id;
	public $board_id;
	public $board_name;
	public $list_limit;
	public $default_order;
	public $permit_write;
	public $permit_comment;
	public $skin_list;
	public $skin_write;
	public $skin_read;
	public $group_no;
	public $permit_user;

	public function __construct(){}
}