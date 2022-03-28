<?php
namespace Project\Entity;

class Board {
	public $id;
	public $subject;
	public $content;
	public $main_image;
	public $attached_file;
	public $announce;
	public $secret;
	public $reg_time;
	public $user_id;
    
    public function __construct() {}
    
    public function lib_kstrcut($len){
    		$str=strip_tags($this->content);
		$count=0;
		preg_match_all('/[\xEA-\xED][\x80-\xFF]{2}|./', $str, $b);
		$m=$b[0];
		$slen=strlen($str);
		$mlen=count($m);
		if($slen>$len){
			$ret=array();
			for($i=0;$i<$len;$i++){
				$count+=(strlen($m[$i])>1)?2:1;
				if($count>$len) break;
				$ret[]=$m[$i];	
			}
			$str=join('',$ret)."...";
		}
		return $str;
	}
}