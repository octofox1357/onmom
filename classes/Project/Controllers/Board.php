<?php
namespace Project\Controllers;

class Board {
    private $boardTable;
    private $boardMetadataTable;
    private $authentication;

    public function __construct($boardTable, $boardMetadataTable, $authentication){
        $this->boardTable = $boardTable;
        $this->boardMetadataTable = $boardMetadataTable;
        $this->authentication = $authentication;

    }
    public function writePostPage(){
        if (isset($_GET['post_id'])) {
			$post = $this->boardTable->findById($_GET['post_id']);
		}
        $boardMetadata = $this->boardMetadataTable->find('board_id', $_GET['board_id'])[0];

        return ['template' => 'post_write.html.php',
            'variables' => [
            		'board_metadata' => $boardMetadata,
            		'post' => $post ?? null,
            ]
        ];
    }
    public function saveEdit(){
        $user = $this->authentication->getUser();
        $post = $_POST['post'];
        $post = $user->writePost($post);

        header('location: /post/read?board_id='.$_POST['board_id'].'&post_id='.$post->id);
    }

    public function listPage(){
        $page = $_GET['page'] ?? 1;
        $offset = ($page-1)*15;

        $boardMetadata = $this->boardMetadataTable->find('board_id', $_GET['board_id'])[0];

		return ['template' => 'board_skin/'.$boardMetadata->skin_list.'/post_list.html.php',
			'variables' => [
				'board_metadata' => $boardMetadata,
				'total_post'=> $this->boardTable->total(),
				'post_list' => $this->boardTable->findAll('reg_time DESC', 15, $offset),
				'current_page' => $page
			],
		];
    }

    public function readPage(){
        $post = $this->boardTable->findById($_GET['post_id']);
        $boardMetadata = $this->boardMetadataTable->find('board_id', $_GET['board_id'])[0];

        return ['template' => 'post_read.html.php',
            'variables' => [
            		'board_metadata' => $boardMetadata,
            		'post' => $post,
            ],
        ];
    }

    public function deletePost(){
		$user = $this->authentication->getUser();
        $post = $this->boardTable->findById($_POST['id']);
        
		if ( $user->level != 1 ) {
            return;
        }
        
		if($post->attached_file){
			unlink("./attached_files/".$post->attached_file);
		}
		if($post->main_image){
			unlink("./attached_files/".$post->main_image);
		}

		$res = preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $post->content, $matches);
		if($res){
			for($i = 0; $i < count($matches[1]); $i++){
				unlink(".".$matches[1][$i]);
			}
        }
        
		$this->boardTable->delete($_POST['id']);

		header("location: /post/list?board_id=".$_POST['board_id']."");
    }

    public function saveImage(){
		ob_clean();
		if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
                $name = uniqid('img_');
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = './attached_files/' . $filename;
                $location = $_FILES["file"]["tmp_name"];
                move_uploaded_file($location, $destination);
                echo '/attached_files/' . $filename;
				die();	
			} else {
            	echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
				die();
			}
        }
    }
    
    public function deleteImage(){
        ob_clean();
        $src = $_POST['src'];
        $file_name = ".".str_replace("http://" . $_SERVER['SERVER_NAME'], '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
        die();
	}
}