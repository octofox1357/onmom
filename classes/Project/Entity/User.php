<?php
namespace Project\Entity;

class User {
	public $id;
	public $email;
	public $password;
	public $name;
    public $phone;
    public $address;
    public int $level;

    private $boardTable;

    public function __construct($boardTable) {
        $this->boardTable = $boardTable;
    }

    public function fileUpload($file){
		$ext = explode(".",$file['name']);
		$ext_pos = count($ext)-1;
		$target_dir   = "./attached_files/";
		unset($file_name);
		for($f = 0; $f < $ext_pos; $f++) $file_name.=$ext[$f];
		$file_name = substr(time(),-3)."_".$file_name;
		$file_name  = str_replace(" ", "_",$file_name);
		$file_name  = str_replace(".", "_",$file_name);
		$file_name  = str_replace("__", "_",$file_name).".".$ext[$ext_pos];
		$target_file  = $target_dir.basename($file_name);
		if (is_uploaded_file($file['tmp_name']) && $file['size'] ) {
			move_uploaded_file($file["tmp_name"], $target_file);
		}
		return $file_name;
    }
    

    public function writePost($post) {
        $post['user_id'] = $this->id;
        
        if($post['id'] == null){
            $post['reg_time'] = time();
        }

		if(@getimagesize($_FILES["main_image"]["tmp_name"]) !== false && ($_FILES["main_image"]["type"]=="image/png" || $_FILES["main_image"]["type"]=="image/jpeg" || $_FILES["main_image"]["type"]=="image/gif")){
			$post['main_image']=$this->fileUpload($_FILES['main_image']);
		}
		
		if($_FILES['attached_file']['size']){
			$permit_file=array("jpg","jpeg","png","gif","ico","pdf","doc","docx","ppt","pptx","pps","ppsx","odt","xls","xlsx","psd","mp3","m4a","ogg","wav","mp4","mov","wmv","avi","mpg","ogv","3gp","3g2","zip","hwp","hwpx");
			$ext=explode(".",$_FILES['attached_file']['name']);
			$ext_pos=count($ext)-1;
			if(in_array($ext[$ext_pos],$permit_file)){
				$post['attached_file']=$this->fileUpload($_FILES['attached_file']);
			}
		}
		
		return $res = $this->boardTable->save($post);
    }
    
}